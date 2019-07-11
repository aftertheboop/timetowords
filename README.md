#The Time in Words

Given the time in numerals we may convert it into words, as shown below:

* 5:00 -> five o' clock
* 5:01 -> one minute past five
* 5:10 -> ten minutes past five
* 5:15 -> quarter past five
* 5:30 -> half past five
* 5:40 -> twenty minutes to six
* 5:45 -> quarter to six
* 5:47 -> thirteen minutes to six
* 5:28 -> twenty eight minutes past five

Write a program which prints the time in words for the input given in the format described.

**Function Description**

Create a function called `time_in_words`. It should return a time string as described.

`time_in_words` has the following parameter(s):
* h: an integer representing hour of the day
* m: an integer representing minutes after the hour

**Constraints**  

* 1 <= h <= 12  
* 0 <= m <= 60

**Sample 1:**  
`> time_in_words(5, 47)`  
`> thirteen minutes to six`


**Sample 2:**

`> time_in_words(3, 0)`  
`> three o' clock`


**Sample 3:**  
`> time_in_words(7, 15)`  
`> quarter past seven`