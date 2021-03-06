import sqlite3
import Student
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

    con = sqlite3.connect('StudentDB.db')
    c = con.cursor()

    c.execute("SELECT * FROM Students WHERE StudentID = ?", (tempID,))
    entry = c.fetchone() #REF: https://stackoverflow.com/questions/39793327/sqlite3-insert-if-not-exist-with-python
    if entry is not None:
        print('Student ID already exists. Exiting.')
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

    tempStudent = Student.Student(tempID, tempFN, tempLN, tempGPA, tempMajor, tempFA)

    c.execute("INSERT INTO Students VALUES (?, ?, ? ,?, ?, ?)", tempStudent.getInfo())

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

    if c.rowcount == 1:
        print('Student updated')
    else:
        print('No student found with that ID.')

    con.commit()


def displaySorted():
    con = sqlite3.connect('StudentDB.db')
    c = con.cursor()
    sortOrSearch = input('Would you like to search for a specific Major, GPA, or advisor?(y/n) ')
    if sortOrSearch.isalpha() is False:
        print('Not a valid entry.')
        return None

    if sortOrSearch != 'y' and sortOrSearch != 'n':
        print('Not a valid entry.')
        return None

    if sortOrSearch == 'y':
        typeOfSearch = input('What would you like to sort by? (m, g, a) ')
        if typeOfSearch.isalpha() is False:
            print('Not a valid entry.')
            return None

        if typeOfSearch != 'm' and typeOfSearch != 'g' and typeOfSearch != 'a':
            print('Not a valid entry.')
            return None

        if typeOfSearch == 'm':
            tempMajor = input('What major? ')
            c.execute('SELECT * FROM Students WHERE Major = ?', (tempMajor,))
        elif typeOfSearch == 'g':
            tempGPA = input('What GPA? ')
            c.execute('SELECT * FROM Students WHERE GPA = ?', (tempGPA,))
        else:
            tempFA = input('Which advisor? ')
            c.execute('SELECT * FROM Students WHERE FacultyAdvisor = ?', (tempFA,))

    else:

        choice = input('Would you like to sort by Major (m), GPA (g), or Advisor (a)? ')
        if choice.isalpha() is False:
            print('Not a valid entry.')
            return None

        if choice != 'm' and choice != 'g' and choice != 'a':
            print('Not a valid entry.')
            return None

        if choice == 'm':
            c.execute('SELECT * FROM Students ORDER BY Major')
        elif choice == 'g':
            c.execute('SELECT * FROM Students ORDER BY GPA DESC')
        else:
            c.execute('SELECT * FROM Students ORDER BY FacultyAdvisor')

    for row in c:
        print(row)