package com.company;
import java.sql.*;

public class Main {

    public static void main(String[] args) {

        DBCon myConnection = new DBCon();
        Connection con = myConnection.getCon();

        ImportData shelters = new ImportData(con);
        shelters.importShelters("shelters.csv");

    }
}
