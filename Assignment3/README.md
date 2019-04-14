# Assignment 3 - DB for OCAdopt

For this assignment, I've chosen to generate a csv file using a fake-data generation library in Python called 'faker'. I have created
two csv files for this assignment - pets.csv and shelters.csv. ((Documentation on Faker here)[https://faker.readthedocs.io/en/stable/providers.html])

In my java implementation to load in the csv's, I first load in the shelters to make sure they exist before inserting them. Then, I add in
the animal to the Pet table and then their info to the PetInfo table. The breed and animaltypes table are pre-loaded with some options, but the same idea
could be applied to them as well.
