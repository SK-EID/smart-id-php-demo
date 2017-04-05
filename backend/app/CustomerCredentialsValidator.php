<?php

class CustomerCredentialsValidator
{
  const COUNTRY_EE = 'EE';
  const COUNTRY_LT = 'LT';
  const COUNTRY_LV = 'LV';

  /**
   * @param string $countryCode
   * @param string $nationalIdentityNumber
   * @return bool
   */
  public static function validate( $countryCode, $nationalIdentityNumber )
  {
    if ( !self::hasBothCredentials( $countryCode, $nationalIdentityNumber ) )
    {
      return false;
    }

    if ( !self::isNationalIdentityNumberValid( $countryCode, $nationalIdentityNumber ) )
    {
      return false;
    }

    return true;
  }

  /**
   * @param string $countryCode
   * @param string $nationalIdentityNumber
   * @return bool
   */
  private static function hasBothCredentials( $countryCode, $nationalIdentityNumber )
  {
    if ( empty( $countryCode ) || empty( $nationalIdentityNumber ) )
    {
      return false;
    }

    if ( !in_array( $countryCode, array( self::COUNTRY_EE, self::COUNTRY_LT, self::COUNTRY_LV ) ) )
    {
      return false;
    }

    return true;
  }

  /**
   * @param string $countryCode
   * @param string $nationalIdentityNumber
   * @return bool
   */
  private static function isNationalIdentityNumberValid( $countryCode, $nationalIdentityNumber )
  {
    switch ( $countryCode )
    {
      case self::COUNTRY_EE:
      case self::COUNTRY_LT:
        return self::isEEAndLTNationalIdentityNumberValid( $nationalIdentityNumber );

      case self::COUNTRY_LV:
        return self::isLVNationalIdentityNumberValid( $nationalIdentityNumber );

      default:
        return false;
    }
  }

  /**
   * @param string $nationalIdentityNumber
   * @return bool
   */
  private static function isEEAndLTNationalIdentityNumberValid( $nationalIdentityNumber )
  {
    if ( preg_match( '/^[0-9]{11}$/', $nationalIdentityNumber ) === 0 )
    {
      return false;
    }

    $genderAndCenturyNumber = (int) substr( $nationalIdentityNumber, 0, 1 );
    $birthYear = (int) substr( $nationalIdentityNumber, 1, 2 );
    $birthMonth = (int) substr( $nationalIdentityNumber, 3, 2 );
    $birthDay = (int) substr( $nationalIdentityNumber, 5, 2 );
    $century = $genderAndCenturyNumber % 2 === 0
        ? 17 + $genderAndCenturyNumber / 2 : 17 + ( $genderAndCenturyNumber
                                                    + 1 ) / 2;
    $birthYear = 100 * $century + $birthYear;
    if ( !self::isValidDateComponents( $birthYear, $birthMonth, $birthDay, true ) )
    {
      return false;
    }

    return self::isValidChecksumForEEAndLTNationalIdentityNumber( $nationalIdentityNumber );
  }

  /**
   * @param string $nationalIdentityNumber
   * @return bool
   */
  private static function isLVNationalIdentityNumberValid( $nationalIdentityNumber )
  {
    if ( preg_match( '/^[0-9]{6}[-]{0,1}[0-9]{5}$/', $nationalIdentityNumber ) === 0 )
    {
      return false;
    }

    $nationalIdentityNumber = preg_replace( '/\D/', '', $nationalIdentityNumber );
    $birthDay = (int) substr( $nationalIdentityNumber, 0, 2 );
    $birthMonth = (int) substr( $nationalIdentityNumber, 2, 2 );
    $birthYear = (int) substr( $nationalIdentityNumber, 4, 2 );
    $birthYear = $birthYear + 1800 + 100 * (int) substr( $nationalIdentityNumber, 6, 1 );
    if ( !self::isValidDateComponents( $birthYear, $birthMonth, $birthDay, true ) )
    {
      return false;
    }

    return self::isValidChecksumForLVNationalIdentityNumber( $nationalIdentityNumber );
  }

  /**
   * @param int $year
   * @param int $month
   * @param int $day
   * @param boolean $compareToCurrentDate
   * @return bool
   */
  private static function isValidDateComponents( $year, $month, $day, $compareToCurrentDate )
  {
    if ( strlen( $day ) > 2 || strlen( $month ) > 2 || strlen( $year ) > 4 )
    {
      return false;
    }

    if ( 1e3 > $year || $year > 9999 || 0 >= $month || $month > 12 )
    {
      return false;
    }

    $monthsLimits = array( 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 );

    if ( $year % 400 == 0 || $year % 100 != 0 && $year % 4 == 0 )
    {
      $monthsLimits[1] = 29;
    }

    if ( 0 >= $day || $day > $monthsLimits[ $month - 1 ] )
    {
      return false;
    }

    if ( $compareToCurrentDate === true )
    {
      $currentDate = new DateTime();
      $currentYear = (int) $currentDate->format( 'Y' );
      $currentMonth = (int) $currentDate->format( 'n' );
      $currentDay = (int) $currentDate->format( 'j' );

      return $currentYear > $year
             || $year === $currentYear
                && $currentMonth > $month
             || $year === $currentYear
                && $month === $currentMonth
                && $currentDay > $day;
    }

    return true;
  }

  /**
   * @param string $nationalIdentityNumber
   * @return bool
   */
  private static function isValidChecksumForEEAndLTNationalIdentityNumber( $nationalIdentityNumber )
  {
    $weights = array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 1 );
    $getChecksum = function( $weights, $nationalIdentityNumber )
    {
      $checkSum = 0;
      for ( $i = 0; $i < 10; $i++ )
      {
        $checkSum += (int) $nationalIdentityNumber[ $i ] * $weights[ $i ];
      }
      return $checkSum % 11;
    };

    if ( ( $checkSum = $getChecksum( $weights, $nationalIdentityNumber ) ) != 10 )
    {
      return $checkSum === (int) substr( $nationalIdentityNumber, 10, 1 );
    }

    $weights = array( 3, 4, 5, 6, 7, 8, 9, 1, 2, 3 );
    if ( ( $checkSum = $getChecksum( $weights, $nationalIdentityNumber ) ) == 10 )
    {
      return $checkSum === (int) substr( $nationalIdentityNumber, 10, 1 );
    }

    return true;
  }

  /**
   * @param string $nationalIdentityNumber
   * @return bool
   */
  private static function isValidChecksumForLVNationalIdentityNumber( $nationalIdentityNumber )
  {
    $weights = array( 10, 5, 8, 4, 2, 1, 6, 3, 7, 9 );
    $getChecksum = function( $weights, $nationalIdentityNumber )
    {
      $checkSum = 0;
      for ( $i = 0; $i < 10; $i++ )
      {
        $checkSum += (int) $nationalIdentityNumber[ $i ] * $weights[ $i ];
      }
      return ( $checkSum + 1 ) % 11 % 10;
    };

    $checkSum = $getChecksum( $weights, $nationalIdentityNumber );
    return $checkSum === (int) substr( $nationalIdentityNumber, 10, 1 );
  }
}