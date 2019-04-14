package com.company;
import java.io.FileReader;
import java.io.Reader;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.sql.*;
import org.apache.commons.csv.CSVFormat;
import org.apache.commons.csv.CSVParser;
import org.apache.commons.csv.CSVParser;
import org.apache.commons.csv.CSVRecord;

public class ImportData {
    private java.sql.Connection con;

    public ImportData(java.sql.Connection con) {
        this.con = con;
    }

    public void importShelters(String fileName) {

        try {
            Reader reader = new FileReader(fileName); //path to csv here
            Iterable<CSVRecord> records = CSVFormat.EXCEL.parse(reader);

            for (CSVRecord record : records) {
                String name = record.get(0);
                String city = record.get(1);
                String street = record.get(2);
                String phoneNumber = record.get(3);
                String website = record.get(4);

                PreparedStatement st = con.prepareStatement("INSERT INTO Shelters(name, city, street, phoneNumber, website) VALUES (?, ?, ?, ?, ?)", Statement.RETURN_GENERATED_KEYS);

                st.setString(1, name);
                st.setString(2, city);
                st.setString(3, street);
                st.setString(4, phoneNumber);
                st.setString(5, website);

                st.executeUpdate();

            }
        }
        catch (Exception e) {
            System.out.println(e.getMessage());
        }

        System.out.println("Done");

    }

    public void importAnimals(String fileName) {

        try {
            Reader reader = new FileReader(fileName); //path to csv here
            Iterable<CSVRecord> records = CSVFormat.EXCEL.parse(reader);

            for (CSVRecord record : records) {
                String getAnimalType = record.get(0);
                int animalType = Integer.valueOf(getAnimalType);
                String name = record.get(1);
                String color = record.get(2);
                String getAge = record.get(3);
                int age = Integer.valueOf(getAge);
                String gender = record.get(4);
                String sWeight = record.get(5);
                double weight = Double.valueOf(sWeight);
                String sShelter = record.get(6);
                int shelterID = Integer.valueOf(sShelter);

                String getPrice = record.get(7);
                double price = Double.valueOf(getPrice);

                String getBreed = record.get(8);
                int breedID = Integer.valueOf(getBreed);

                PreparedStatement st = con.prepareStatement("INSERT INTO PetInfo(animalType, color, age, gender, weight, price, breedID) VALUES (?, ?, ?, ?, ?, ?, ?)", Statement.RETURN_GENERATED_KEYS);

                st.setInt(1, animalType);
                st.setString(2, color);
                st.setInt(3, age);
                st.setString(4, gender);
                st.setDouble(5, weight);
                st.setDouble(6, price);
                st.setInt(7, breedID);

                st.executeUpdate();

                PreparedStatement st2 = con.prepareStatement("INSERT INTO Pet(name, infoID, shelterID) VALUES (?, ?, ?)", Statement.RETURN_GENERATED_KEYS);

                st2.setString(1, name);
                ResultSet generatedKeys = st.getGeneratedKeys();
                if(generatedKeys.next()) {
                    st2.setInt(2, generatedKeys.getInt(1));
                }
                st2.setInt(3, shelterID);

                st2.executeUpdate();

            }
        }
        catch (Exception e) {
            System.out.println(e.getMessage());
        }

        System.out.println("Done");

    }
}
