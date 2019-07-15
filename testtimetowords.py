import unittest
from timetowords import time_in_words


class TimeTest(unittest.TestCase):

    def test(self):
        print(self.assertEqual(time_in_words(12, 00), "twelve o'clock"))
        print(self.assertEqual(time_in_words(9, 45), "quarter to ten"))
        print(self.assertEqual(time_in_words(3, 17), "seventeen minutes past three"))
        print(self.assertEqual(time_in_words(12, 33), "twenty seven minutes to one"))
        print(self.assertEqual(time_in_words(8, 3), "three minutes past eight"))
        print(self.assertEqual(time_in_words(7, 30), "half past seven"))
