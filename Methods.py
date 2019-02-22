import sqlite3
def displayAll():
    con = sqlite3.connect('StudentDB.db')
    c = con.cursor() #allows python code to execute SQL statements

    c.execute("SELECT * FROM Students")

    for row in c:
        print(row)


def createStudent():
    tempID = input('Enter the student\'s ID: ')
    try:
        tempID = int(tempID)
    except ValueError:
        print("Not a valid entry.")
        return None

    tempFN = input('Enter the student\'s first name: ')
    if all(c.isalpha() or c.isspace() for c in tempFN) is False: #REF: https://stackoverflow.com/questions/20890618/isalpha-python-function-wont-consider-spaces
        print("Not a valid entry.")
        return None

    tempLN = input('Enter the student\'s last name: ')
    if all(c.isalpha() or c.isspace() for c in tempLN) is False:
        print("Not a vlid entry.")
        return None

    tempGPA = input('Enter the student\'s GPA: ')
    try:
        tempGPA = float(tempGPA)
    except ValueError:
        print("Not a valid entry.")
        return None

    tempMajor = input('Enter the student\'s major: ')
    if all(c.isalpha() or c.isspace() for c in tempMajor) is False:
        print('Not a valid entry.')
        return None

    tempFA = input('Enter the student\'s faculty advisor: ')
    if all(c.isalpha() or c.isspace() for c in tempFA) is False:
        print('Not a valid entry.')
        return None

    con = sqlite3.connect('StudentDB.db')
    c = con.cursor()

    c.execute("INSERT INTO Students VALUES (?, ?, ? ,?, ?, ?)", (tempID, tempFN, tempLN, tempGPA, tempMajor, tempFA))

    con.commit()
    print("Student added.")


def deleteStudent():
    tempID = input('Enter the student\'s ID that you wish to remove: ')
    try:
        tempID = int(tempID)
    except ValueError:
        print('Not a valid entry.')
        return None

    con = sqlite3.connect('StudentDB.db')
    c = con.cursor()

    c.execute("DELETE FROM Students WHERE StudentID = ?", (tempID,))

    con.commit()
    print("Student deleted.")

def updateInfo():
    tempID = input('Enter the student\'s ID: ')
    try:
        tempID = int(tempID)
    except ValueError:
        print('Not a valid entry.')
        return None

    choice = input('Would you like to update their Major (m), Factuly Advisor (a), or both (b)? ')
    if choice.isalpha() is False :
        print('Not a valid entry')
        return None

    if choice == 'm' or choice == 'b' :
        tempMajor = input('Enter the new major: ')
        if all(c.isalpha() or c.isspace() for c in tempMajor) is False:
            print('Not a valid entry')
            return None

    if choice == 'a' or choice == 'b':
        tempFA = input('Enter the new faculty advisor: ')
        if all(c.isalpha() or c.isspace() for c in tempFA) is False:
            print('Not a valid entry')
            return None

    if choice != 'a' and choice != 'm' and choice != 'b':
        print('Not a valid entry')
        return None

    con = sqlite3.connect('StudentDB.db')
    c = con.cursor()

    if choice == 'm' or choice == 'b':
        c.execute('UPDATE Students SET Major = ? WHERE StudentID = ?', (tempMajor, tempID))

    if choice == 'a' or choice == 'b':
        c.execute('UPDATE Students SET FacultyAdvisor = ? WHERE StudentID = ?', (tempFA, tempID))

    #issue here - what is sID doesn't exist in the table? Nothing to the DB, but 'Student Updated' still printed

    con.commit()
    print('Student updated')


def displaySorted():
    choice = input('Would you like to sort by Major (m), GPA (g), or Advisor (a)? ')
    if choice.isalpha() is False:
        print('Not a valid entry.')
        return None

    if choice != 'm' and choice != 'g' and choice != 'a':
        print('Not a valid entry.')
        return None

    con = sqlite3.connect('StudentDB.db')
    c = con.cursor()

    if choice == 'm':
        c.execute('SELECT * FROM Students ORDER BY Major')
    elif choice == 'g':
        c.execute('SELECT * FROM Students ORDER BY GPA DESC')
    else:
        c.execute('SELECT * FROM Students ORDER BY FacultyAdvisor')

    for row in c:
        print(row)