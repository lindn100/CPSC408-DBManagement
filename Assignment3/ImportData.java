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
}
