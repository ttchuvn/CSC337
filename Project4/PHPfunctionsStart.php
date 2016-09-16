<?php
/**
 * 8 PHP functions requiring functions, assert, selection, repetition, and arrays.
 * The code is quasi-tested with asserts given at the end of this one file.
 * Feel free to write more asserts (we will).
 * 
 * Programmer: TOAN CHU
 */
// 1) minOfThree
//
// Given three string arguments, return the one the comes first alphabetically
function minOfThree($a, $b, $c) {
	return min($a,$b,$c);
}

// 2) romanNumeral
//
// Complete the free function romanNumeral that returns the numeric
// equivalent of an upper- or lower-case Roman numeral, which is actually
// a char. Roman numerals and their decimal equivalents are
// 'I' (or 'i') = 1
// 'V' (or 'v') = 5
// 'X' (or 'x') = 10
// 'L' (or 'l') = 50
// 'C' (or 'c') = 100
// 'D' or ('d') = 500
// 'M' (or 'm') = 1,000
//
// If the input is not a valid Roman numeral, return -1
function romanNumeral($ch) {
	if($ch == 'I' || $ch == 'i')
		return 1;
	else if ($ch == 'V' || $ch == 'v')
		return 5;
	else if ($ch == 'X' || $ch == 'x')
		return 10;
	else if ($ch == 'L' || $ch == 'l')
		return 50;
	else if ($ch == 'C' || $ch == 'c')
		return 100;
	else if ($ch == 'D' || $ch == 'd')
		return 150;
	else if ($ch == 'M' || $ch == 'm')
		return 1000;
	else
		return -1;
}

// 3) sumOfFirstInts
//
// Return the sum of the first n integers
// sumOfFirstInts(3) == 1 + 2 + 3
function sumOfFirstInts($n) {
	for($i=1;$i<=$n;$i++){
		$sum = $sum + $i;
	}
	return $sum;	
}

// 4) howSwedish
//
// ABBA is a band, they have many songs including Dancing Queen, and
// Fernando. ABBA is actually a Swedish band, so if we wanted to find
// out howSwedish a String is, we could simply find out how many times
// the String contains the substring "abba". We want to look for this
// substring in a case insensitive manner. So "abba" counts, and so
// does "aBbA". We also want to check for overlapping abba's such as
// in the String "abbAbba" that contains "abba" twice.
//
// howSwedish("ABBA a b b a") returns 1
// howSwedish("abbabba!") returns 2
//$c = substr_count($s , $t);
function howSwedish($str) {
	$str = strtolower($str);
	$count = 0;
	for ($x = 0; $x <= strlen($str); $x++){
		if (strcmp(substr($str, $x, 4),"abba") == 0)
		$count++;
	}
	return $count;
}

// 5) isStringSorted
//
// Given a String, return true if the letters are in ascending order.
// Note: 'a' < 'b' and '5' < '8'
// isStringSorted("") returns true
// isStringSorted("a") returns true
// isStringSorted("abbcddef") returns true
// isStringSorted("123456") returns true
// isStringSorted("12321") returns false
function isStringSorted($str) {
	$arr1 = str_split($str);
	$arr2 = str_split($str);
	sort($arr2);
	if ( $arr1 == $arr2){
		return true;
	}
	else {
		return false;
	}
}


// 6) isPrime
//
// One evening, while listening intently at the Very Large Array (VLA)
// radio astronomy observatory 50 miles west of Socorro New Mexico, Ellie
// hears a powerful signal: a prime number pattern emanating from the
// star Vega, confirmed by others the world over, undeniable and strong
// in its pulsing power. What Ellie recognized was the repeating series
// of the first 26 prime numbers. This is someone near Vega trying to
// contact anyone who is listening:
//
//  2 3 5 7 11 13 17 19 23 29 31 37 41 43 47 53 59 61 67 71 73 79 83 89 97
//
// A prime number is a natural number greater than 1 that has no positive
// divisors other than 1 and itself. Complete method isPrime that returns
// true if the argument is a prime number. Hint: Consider writing a loop
// that divides the argument num by every integer from 2 to num-1, returning
// false if num was found to be evenly divisible by any one of those.
//
function isPrime($num) {
	$i = 2;
	while ($i < $num) {
		if ($num % $i) {
			$i++;
			continue;
		}
		return false;
	}
	return true;

}


// 7) isArraySorted
//
// Given an array , return true if the element are in ascending order.
// Note: 'abe' < 'ben' and 5 > 3
function isArraySorted($arr) {
	$sorted = array_values($arr);
	sort($sorted);
	if ( $arr === $sorted ) {
		return true;
	}
	else {
		return false;
	}
}



// 8) numberOfPairs
// 
// Return the number of pairs in array.
// numberOfPairs(array(1, 1, 1)) returns 2
// numberOfPairs(array("A", "BB", "CCC")) returns 0
function numberOfPairs($arr) {
	$count = 0;
	$j=0;
	for($i=0; $i<count($arr)-1; $i++) {
		for($j=$j+1; $j<count($arr); $j++) {
			if($arr[$i] == $arr[$j]) {
				$count++;
			}
		}
	}
	return $count;
}


/**
 * Print some function calls are write minimal test with asserts.
 * Our asserts will be more complete.
 */
//Testing for function 1
echo "\nTesting Function 1:\n";
echo 'min(charlie, baker, able) is ' . minOfThree ( 'charlie', 'baker', 'able' ) . "\n";
echo 'min(u, h, k) is ' . minOfThree ( 'u', 'h', 'k' ) . "\n";
echo 'min(First, Second, Third) is ' . minOfThree ( 'First', 'Second', 'Third') . "\n";
assert ( 'a' == minOfThree ( 'a', 'b', 'c' ) );
assert ( 'a' == minOfThree ( 'b', 'a', 'c' ) );
assert ( 'a' == minOfThree ( 'b', 'c', 'a' ) );
assert ( 'First' == minOfThree ( 'First', 'Second', 'Third' ) );

//Testing for function 2
echo "\nTesting Function 2:\n";
echo "\n" . 'romanNumeral(M) is ' . romanNumeral ( 'M' ) . "\n";
echo "\n" . 'romanNumeral(v) is ' . romanNumeral ( 'v' ) . "\n";
assert ( 1 == romanNumeral ( 'i' ) );
assert ( 1 == romanNumeral ( 'I' ) );
assert ( 5 == romanNumeral ( 'v' ) );
assert ( 5 == romanNumeral ( 'V' ) );

//Testing for function 3
echo "\nTesting Function 3:\n";
echo "\n" . 'sumOfFirstInts(5)? ' . sumOfFirstInts ( 5 ) . "\n";
assert ( 0 == sumOfFirstInts ( 0 ) );
assert ( 1 == sumOfFirstInts ( 1 ) );
assert ( 6 == sumOfFirstInts ( 3 ) );
assert ( 1 + 2 + 3 + 4 + 5 == sumOfFirstInts ( 5 ) );

//Testing for function 4
echo "\nTesting Function 4:\n";
echo "\nhowSwedish(\"ABBA a b b a\")" . howSwedish ( "ABBA a b b a" ) . "\n";
echo "\nhowSwedish(\"abbabba abbabba\")" . howSwedish ( "abbabba abbabba" ) . "\n";
echo "\nhowSwedish(\"abba\")" . howSwedish ( "abba" ) . "\n";
echo "\nhowSwedish(\"aBbAbBa\")" . howSwedish ( "aBbAbBa" ) . "\n";
assert ( 2 == howSwedish ( "abbabba" ) );
assert ( 2 == howSwedish ( "aBbAbBa" ) );
assert ( 1 == howSwedish ( "abba" ) );
assert ( 0 == howSwedish ( "none" ) );
assert ( 0 == howSwedish ( "no" ) );

//Testing for function 5
echo "\nTesting Function 5:\n";
echo "\n" . 'isStringSorted(abcddeeff)? ' . isStringSorted ( 'abcddeeff' ) . "\n";
echo "\n" . 'isStringSorted(axyz)? ' . isStringSorted ( 'axyz' ) . "\n";
assert ( isStringSorted ( 'abcddeeff' ) );
assert ( ! isStringSorted ( 'zyxa' ) );
//Testing for function 6
echo "\nTesting Function 6:\n";
echo "\n" . 'isPrime(7)? ' . isPrime ( 7 ) . "\n";
assert ( isPrime ( 7 ) );
assert ( isPrime ( 11 ) );
assert ( !isPrime ( 12 ) );

//Testing for function 7
echo "\nTesting Function 7:\n";
echo "\n" . 'isArraySorted(array(1, 2, 2)? ' . isArraySorted ( array (
		1,
		2,
		2
) ) . "\n";
assert ( isArraySorted ( array (
		- 4,
		1,
		2,
		2,
		3,
		5,
		99
) ) );
assert ( isArraySorted ( array (
		- 4,
		1,
		2,
		2,
		3,
		5,
		99
) ) );
assert ( ! isArraySorted ( array (
		3,
		3,
		2
) ) );

//Testing for function 8
echo "\nTesting Function 8:\n";
$cars = array("A", "BB", "CCC");
$number = array(1,1,1);
echo 'numberOfPairs(1,1,1) is ' . numberOfPairs ($cars) . "\n";
echo 'numberOfPairs(1,1,1) is ' . numberOfPairs ($number) . "\n";
assert ( 2 == numberOfPairs ($number) );
assert ( 0 == numberOfPairs ($car) );
?>