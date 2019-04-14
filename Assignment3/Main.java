package com.company;
import java.sql.*;

public class Main {

    public static void main(String[] args) {

        DBCon myConnection = new DBCon();
        Connection con = myConnection.getCon();

        ImportData importing = new ImportData(con);
        //importing.importShelters("shelters.csv");
        importing.importAnimals("pets.csv");

    }
}
