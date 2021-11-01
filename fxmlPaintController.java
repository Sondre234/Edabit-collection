/*
    Controller class for paint.fxml
    Needs to draw when drawing is enabled,
    Erase when eraser is enabled,
    Make a circle when circle is enabled,
    Make a rectangle when rectangle is enabled.

 */


package com.example.fxoving;

import javafx.application.Platform;
import javafx.fxml.FXML;
import javafx.scene.canvas.Canvas;
import javafx.scene.canvas.GraphicsContext;
import javafx.scene.control.CheckBox;
import javafx.scene.control.ColorPicker;
import javafx.scene.control.TextField;
import javafx.scene.control.ToggleButton;
import javafx.scene.image.Image;
import javafx.scene.shape.Circle;
import javafx.scene.shape.Rectangle;


public class PaintController {

    @FXML
    private Canvas canvas;

    @FXML
    private ColorPicker colorPicker;

    @FXML
    private TextField brushSize;

    @FXML
    private CheckBox eraser;

    @FXML
    private ToggleButton drawButton;

    @FXML
    private ToggleButton circleButton;

    @FXML
    private ToggleButton rectangleButton;

    Rectangle rect = new Rectangle();
    Circle circ = new Circle();





    // Draw with mouse when draw button is toggled
    public void initialize() {

        // Program doesn't work if I declare g earlier and IDK why
        GraphicsContext g = canvas.getGraphicsContext2D();

        canvas.setOnMouseDragged(e ->{


            double size = Double.parseDouble(brushSize.getText());
            double x = e.getX() - size / 2;
            double y = e.getY() - size / 2;

            if (eraser.isSelected()) {
                g.clearRect(x, y, size, size);
            } else if (drawButton.isSelected())  {
                g.setFill(colorPicker.getValue());
                g.fillRect(x, y, size, size);
            }
        });
    }
    // Questionable atm
    public void onSave() {

        System.out.println("Saved");

    }
    //Exit the program when clicked.
    public void onExit() {
        Platform.exit();
    }

    // Draw circle when circle button is clicked
    public void circle() {

        // Program doesn't work if I declare g earlier and IDK why
        GraphicsContext g = canvas.getGraphicsContext2D();

        canvas.setOnMouseClicked(e -> {

            if (circleButton.isSelected()) {

                g.setStroke(colorPicker.getValue());
                g.setFill(colorPicker.getValue());
                circ.setCenterX(e.getX());
                circ.setCenterY(e.getY());

            }
        });

    }
    // Draw rectangle when rectangle button is clicked
    public void rectangle() {

        // Program doesn't work if I declare g earlier and IDK why
        GraphicsContext g = canvas.getGraphicsContext2D();

        canvas.setOnMouseClicked(e -> {

            if (circleButton.isSelected()) {

                g.setStroke(colorPicker.getValue());
                g.setFill(colorPicker.getValue());
                rect.setX(e.getX());
                rect.setY(e.getY());
            }
        });

        canvas.setOnMouseReleased(e -> {
            if (circleButton.isSelected()) {
                circ.setRadius((Math.abs(e.getX() - circ.getCenterX()) + Math.abs(e.getY() - circ.getCenterY())) / 2);

                if(circ.getCenterX() > e.getX()) {
                    circ.setCenterX(e.getX());
                }
                if(circ.getCenterY() > e.getY()) {
                    circ.setCenterY(e.getY());
                }
                g.fillOval(circ.getCenterX(), circ.getCenterY(), circ.getRadius(), circ.getRadius());
                g.strokeOval(circ.getCenterX(), circ.getCenterY(), circ.getRadius(), circ.getRadius());
            }
        });

    }
}
