def time_in_words(h, m):

    if (h < 1 or h > 12) or (m < 0 or m > 60):
        print('Please enter a valid time between 0:0 and 11:59')
        exit

    minute_str = format_minutes(m)
    hour_str = format_hour(h, m)
    return_str = ''

    # This should probably be done with a switch but python's switch
    # support seems funky. Can always be refactored
    if m == 0:
        return_str = "{} o'clock".format(hour_str)
    elif m == 15:
            return_str = "quarter past {}".format(hour_str)
    elif m == 30:
        return_str = "half past {}".format(hour_str)
    elif m == 45:
        return_str = "quarter to {}".format(hour_str)
    else:
        return_str = string_time(m, hour_str, minute_str)

    return return_str


def string_time(m, hour_str, minute_str):
    # If minutes = 1
    if m == 1:
        return "{} minute past {}".format(minute_str, hour_str)
    # If minutes are less than 30
    if m < 30:
        return "{} minutes past {}".format(minute_str, hour_str)
    # If minutes are greater than 30
    if m > 30:
        return "{} minutes to {}".format(minute_str, hour_str)


def format_hour(h, m):
    # A small data sample like this doesn't need a database
    h_strings = {
        1: 'one',
        2: 'two',
        3: 'three',
        4: 'four',
        5: 'five',
        6: 'six',
        7: 'seven',
        8: 'eight',
        9: 'nine',
        10: 'ten',
        11: 'eleven',
        12: 'twelve'
    }
    # If m > 30 then advance the hour by 1, if it rolls over to
    # 12, reset to 1
    if m > 30:
        h_key = h + 1
        if h_key > 12:
            h_key = 1

        return h_strings[h_key]

    else:

        return h_strings[h]


def format_minutes(m):

    m_strings = {
        0: '',
        1: 'one',
        2: 'two',
        3: 'three',
        4: 'four',
        5: 'five',
        6: 'six',
        7: 'seven',
        8: 'eight',
        9: 'nine',
        10: 'ten',
        11: 'eleven',
        12: 'twelve',
        13: 'thirteen',
        14: 'fourteen',
        16: 'sixteen',
        17: 'seventeen',
        18: 'eighteen',
        19: 'nineteen',
        20: 'twenty'
    }

    if m == 0 or m == 30 or m == 15 or m == 45:
        return ''

    # Calculate the difference if m > 30
    if m > 30:
        m = 60 - m
    # Compound strings together if value is greater than 20
    if m > 20:
        # Cast to a string and extract the two characters
        m = str(m)
        m1 = int(m[0] + "0")
        m2 = int(m[1])

        m_str = m_strings[m1] + ' ' + m_strings[m2]

    else:
        m_str = m_strings[m]

    return m_str
