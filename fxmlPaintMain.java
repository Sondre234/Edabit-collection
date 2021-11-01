package com.example.fxoving;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.paint.Color;
import javafx.stage.Stage;
import javafx.fxml.FXML;



import static javafx.fxml.FXMLLoader.load;

public class PaintApp extends Application {

    @Override
    public void start (Stage stage) throws Exception {

        stage.setScene(new Scene(FXMLLoader.load(getClass().getResource("paint.fxml"))));
        stage.setTitle("Paint App");
        stage.show();
    }

    public static void main(String[] args) {

        launch(args);
    }


}
