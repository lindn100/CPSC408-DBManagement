package com.company;
import java.sql.*;

public class DBCon {

    public DBCon() {
    }

    public java.sql.Connection getCon(){
        Connection con = null;
        try {
            Class.forName("com.mysql.jdbc.Driver");
            String connectionUrl = "jdbc:mysql://35.247.32.1:3306/OCAdopt";
            con = DriverManager.getConnection(connectionUrl, "user", "notasecurepassword");
        } catch (Exception e) {
            e.printStackTrace();
            System.out.println("Connection failure");
        }
        System.out.println("Done");
        return con;
    }


}
