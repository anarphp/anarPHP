<?php

/**
 * Generate random text-based CAPTCHAs with simple arithmetic and logic questions
 * Website: https://github.com/theodorejb/responsive-Captcha
 * Updated: 2013-08-01
 * Translated : 2014-05-24
 * @author Theodore Brown
 * @Translated Mohsen Ahmadian
 * @version 1.0.1
 */
class ResponsiveCaptcha {

    private $sessionVariableName = "ResponsiveCaptchaAnswer";

    public function __construct() {
        if (session_id() == '') {
            // no session has been started; try starting it
            if (!session_start())
                throw new Exception("Unable to start session");
            else
                session_regenerate_id();
        }
    }

    /**
     * Checks whether a user's response matches the stored answer
     * 
     * @param string $answer The user's submitted response
     * @return boolean TRUE if the answer is correct
     * @throws Exception
     */
    public function checkAnswer($answer) {
        // convert the answer to lower case and trim any whitespace
        $answer = trim($answer);

        // ensure that the session answer variable is set
        if (!isset($_SESSION[$this->sessionVariableName]))
            throw new Exception("The captcha answer session variable is not set");
        else {
            $storedAnswer = $_SESSION[$this->sessionVariableName];
            unset($_SESSION[$this->sessionVariableName]);

            // both numeric and textual answers are acceptable
            if ($answer == $storedAnswer || $answer === $this->getWordFromNumber($storedAnswer))
                return TRUE;
            else
                throw new Exception("Incorrect captcha response");
        }
        return FALSE;
    }

    /**
     * Generate a random question string and store the answer in the session
     * Important: call this method AFTER checking the user's response since it will replace the session answer variable
     */
    public function getNewQuestion() {
        $function = rand(0, 2);

        if ($function == 0)
            return $this->getLetterProblem();
        elseif ($function == 1)
            return $this->getNumberProblem();
        else {
            // get a random arithmetic question
            // get a random number between 1 and 4 to determine whether to add, subtract, multiply, or divide
            $function = rand(1, 4);

            if ($function == 1)
                return $this->getAdditionProblem(); // add
            elseif ($function == 2)
                return $this->getSubtractionProblem(); // subtract
            elseif ($function == 3)
                return $this->getMultiplicationProblem(); // multiply
            else
                return $this->getDivisionProblem(); // divide
        }
    }

    /**
     * Returns a random addition problem after adding the answer to the session
     * Example: "What is the sum of five and six?"
     * 
     * @return string A random addition problem
     */
    private function getAdditionProblem() {
        $num1 = rand(0, 10);
        $num2 = rand(0, 10);

        $this->storeAnswer($num1 + $num2);

        $num1Name = $this->getWordFromNumber($num1);
        $num2Name = $this->getWordFromNumber($num2);

        if (rand(0, 1))
                
            return "جمع دو عدد $num1Name و $num2Name چند می شود؟";
        else
            return "$num1Name به علاوه $num2Name چند می شود؟";
    }

    /**
     * Returns a random subtraction problem
     * Example: "What is eight minus four?"
     * 
     * @return string A random subtraction problem
     */
    private function getSubtractionProblem() {
        // the smaller (or equal) number should be subtracted from the larger number
        $numbers[] = rand(0, 10);
        $numbers[] = rand(0, 10);
        sort($numbers, SORT_NUMERIC); // the first array element is smaller (or equal)

        $smallerNumber = $numbers[0];
        $largerNumber = $numbers[1];

        $smallerNumberName = $this->getWordFromNumber($smallerNumber);
        $largerNumberName = $this->getWordFromNumber($largerNumber);
        $this->storeAnswer($largerNumber - $smallerNumber);

        return "جواب $largerNumberName  منهای $smallerNumberName مساوی است با ؟";
    }

    /**
     * Returns a random multiplication problem
     * Example: "What is two multiplied by seven?"
     * 
     * @return string A random multiplication problem
     */
    private function getMultiplicationProblem() {
        $num1 = rand(0, 10);
        $num2 = rand(0, 10);

        $this->storeAnswer($num1 * $num2);

        $num1Name = $this->getWordFromNumber($num1);
        $num2Name = $this->getWordFromNumber($num2);

        if (rand(0, 1))
            return "ضرب $num1Name در$num2Name چند می شود؟";
        else
            return "جواب $num1Name  ضربدر $num2Name می شود ؟";
    }

    /**
     * Returns a random division problem
     * Example: "What is twenty divided by two?"
     * 
     * @return string A random division question
     */
    private function getDivisionProblem() {
        $quotient = rand(1, 10); // this will be the answer
        $divisor = rand(1, 5); // keep it simple
        $dividend = $quotient * $divisor;

        $dividendName = $this->getWordFromNumber($dividend);
        $divisorName = $this->getWordFromNumber($divisor);
        $this->storeAnswer($quotient);
        return "تقسیم $dividendName بر  $divisorName  چند می شود؟";
    }

    /**
     * Split UTF-8 string to array
     * @param string $string
     * @return array
     */
    private function mb_str_split($string) {
        # Split at all position not after the start: ^
        # and not before the end: $
        return preg_split('/(?<!^)(?!$)/u', $string);
    }

    /**
     * Get a random letter position question
     * Example: "What is the fifth letter in Tokyo?"
     */
    private function getLetterProblem() {
        $words = array(
            "هواپیما",
            "بسکتبال",
            "پروانه",
            "شکلات",
            "گنجشک",
            "پودینگ",
            "فیل",
            "فوتبال",
            "پدربزرگ",
            "هلیکپتر",
            "جزیره",
            "سرو",
            "گربه",
            "خنده",
            "آینه",
            "ملیت",
            "پرتغال",
            "پیانو",
            "مداد",
            "چهاربخشی",
            "رنگین کمان",
            "مسابقه",
            "ریل",
            "برف",
            "بادبان",
            "آب",
            "ماهی",
            "شفاف",
            "فرابنفش",
            "سرعت",
            "شیشه",
            "سنتور",
            "دیروز",
            "زرد",
            "گورخر"
        );

        $numberNames = array(
            "اولین",
            "دومین",
            "سومین",
            "چهارمین",
            "پنجمین"
        );

        $randomWordPosition = array_rand($words);
        $randomWord = $words[$randomWordPosition];
        $randomWordLength = mb_strlen($randomWord,"UTF-8");
        $letterArray = $this->mb_str_split($randomWord);

        // there should be a chance of getting the last letter
        if (rand(1, $randomWordLength) == $randomWordLength) {
            $letterPosName = ' آخرین ';
            $randLetter = end($letterArray); // get the last letter in the word
        } else {
            // ask for one of the first five letters (to keep it simple)
            if ($randomWordLength > 5)
                $max = 5;
            else
                $max = $randomWordLength;

            $randLetterPosition = rand(0, $max - 1);
            $randLetter = $letterArray[$randLetterPosition]; // this is the answer
            $letterPosName = $numberNames[$randLetterPosition];
        }
        $this->storeAnswer($randLetter);
        return "$letterPosName  حرف کلمه $randomWord را بنویسید؟";
    }

    /**
     * For a range of three unique numbers, ask which one is largest or smallest
     * Example: "Which is largest: twenty-one, sixteen, or eighty-four?"
     */
    private function getNumberProblem() {
        $numbers = $this->getUniqueIntegers(3);

        // make a string containing the names of the numbers (e.g. "one, two, or three")
        $numberString = '';
        for ($i = 0; $i < count($numbers); $i++) {
            $numberName = $this->getWordFromNumber($numbers[$i]);
            if ($i == count($numbers) - 1) {
                // the last number
                $numberString .= " یا  $numberName";
            }
            else
                $numberString .= "$numberName, ";
        }

        if (rand(0, 1)) {
            // ask which is smallest
            sort($numbers); // so the first element contains the smallest number
            $this->storeAnswer($numbers[0]);
            return "کدامیک کوچکتر است: $numberString"."؟";
        } else {
            // ask which is largest
            rsort($numbers); // so the first element contains the largest number
            $this->storeAnswer($numbers[0]);
            return "کدامیک بزرگتر است : $numberString"."؟";
        }
    }

    /**
     * Returns the name of any integer less than or equal to 100
     * 
     * @param integer $number A number no greater than 100
     * @return string The name of the integer
     */
    private function getWordFromNumber($number) {
        $numberNames = array(
            0 => "صفر",
            1 => "یک",
            2 => "دو",
            3 => "سه",
            4 => "چهار",
            5 => "پنج",
            6 => "شش",
            7 => "هفت",
            8 => "هشت",
            9 => "نه",
            10 => "ده",
            11 => "یازده",
            12 => "دوازده",
            13 => "سیزده",
            14 => "چهارده",
            15 => "پانزده",
            16 => "شانزده",
            17 => "هفده",
            18 => "هجده",
            19 => "نوزده",
            20 => "بیست",
            30 => "سی",
            40 => "چهل",
            50 => "پنجاه",
            60 => "شصت",
            70 => "هفتاد",
            80 => "هشتاد",
            90 => "نود",
            100 => "صد"
        );

        // make sure the number is an integer
        if (is_int($number)) {
            if (($number >= 0 && $number <= 20) || $number == 100)
                return $numberNames[$number];
            elseif ($number < 100) {
                // split the number into an array of digits
                $numArray = array_reverse(str_split($number));
                $onesPlace = $numArray[0];
                $tensPlace = $numArray[1];

                // get the name of the tens place
                $numGroup = (int) $tensPlace . 0;
                $numberName = $numberNames[$numGroup];

                // add the name of the ones place if it isn't zero
                if ($onesPlace != 0)
                    $numberName .= ' و ' . $numberNames[$onesPlace];
                return $numberName;
            } else {
                throw new Exception("Number is out of range!");
            }
        }
        return FALSE;
    }

    /**
     * Store an answer in the session
     */
    private function storeAnswer($answer) {
        $_SESSION[$this->sessionVariableName] = $answer;
    }

    /**
     * Returns an array of unique integers between 0 and 100
     * 
     * @param int $howMany
     */
    private function getUniqueIntegers($howMany) {
        $min = 0;
        $max = 100;

        // ensure that the requested number of unique integers does not exceed those in the range
        if ($howMany < $max) {
            $numbers = array();
            for ($i = 0; $i < $howMany; $i++) {
                $newNum = rand($min, $max);
                while (in_array($newNum, $numbers)) {
                    $newNum = rand($min, $max);
                }
                $numbers[] = $newNum;
            }
            return $numbers;
        }
        else
            throw new Exception("Requested numbers are out of range!");
    }

}

?>