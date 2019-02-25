from Methods import *
while True:
    print('Please select a choice below:')
    print('1. Display all Student info')
    print('2. Add a new student')
    print('3. Update a student\'s info')
    print('4. Delete student')
    print('5. Display students sorted by info')
    print('6. Exit')
    choice = input('Enter your choice: ')

    try:
        choice = int(choice)
    except ValueError:
        print("Not a valid entry.")
        continue

    if choice == 1:
        displayAll()
    elif choice == 2:
        createStudent()
    elif choice == 3:
        updateInfo()
    elif choice == 4:
        deleteStudent()
    elif choice == 5:
        displaySorted()
    else:
        break