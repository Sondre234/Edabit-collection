package com.example.fxoving;

import javafx.application.Application;
import javafx.stage.Stage;
import javafx.scene.Scene;
import javafx.scene.canvas.Canvas;
import javafx.scene.canvas.GraphicsContext;
import javafx.scene.control.*;
import javafx.scene.layout.VBox;
import javafx.scene.layout.BorderPane;
import javafx.scene.paint.Color;
import javafx.scene.shape.Circle;
import javafx.scene.shape.Ellipse;
import javafx.scene.shape.Line;
import javafx.scene.shape.Rectangle;


public class SondreOblig extends Application {

    public void start(Stage primaryStage) {

        ToggleButton drawButton = new ToggleButton("Draw");
        ToggleButton eraserButton = new ToggleButton("Eraser");
        ToggleButton lineButton = new ToggleButton("Line");
        ToggleButton rectangleButton = new ToggleButton("Rectangle");
        ToggleButton circleButton = new ToggleButton("Circle");
        ToggleButton ellipseButton = new ToggleButton("Ellipse");
        TextField lineSize = new TextField("18");

        lineSize.setEditable(true);
        lineSize.setDisable(false);



        double size = Double.parseDouble(lineSize.getText());



        ColorPicker cpLine = new ColorPicker(Color.BLACK);
        ColorPicker cpFill = new ColorPicker(Color.TRANSPARENT);

        VBox buttons = new VBox(10);

        /*buttons.setPadding(new Insets(5));
        buttons.setStyle("-fx-background-color: #999");
        buttons.setPrefWidth(100);*/

//        ToggleGroup tools = new ToggleGroup();

//        for (ToggleButton tool : buttonsArr) {
//            tool.setMinWidth(90);
//            tool.setToggleGroup(tools);
//            tool.setCursor(Cursor.HAND);
//        }

        /*Label line_color = new Label("Line Color");
        Label fill_color = new Label("Fill Color");
        Label line_width = new Label("3.0");*/

        Canvas canvas = new Canvas(1080, 790);
        GraphicsContext gc;
        gc = canvas.getGraphicsContext2D();
        //    gc.setLineWidth(1);


        Line line = new Line();
        Rectangle rectangle = new Rectangle();
        Circle circle = new Circle();
        Ellipse ellipse = new Ellipse();

        canvas.setOnMousePressed(e -> {

            if(lineButton.isSelected()) {
                gc.setStroke(cpLine.getValue());
                line.setStartX(e.getX());
                line.setStartY(e.getY());
            }

            else if(rectangleButton.isSelected()) {
                gc.setStroke(cpLine.getValue());
                gc.setFill(cpFill.getValue());
                rectangle.setX(e.getX());
                rectangle.setY(e.getY());
            }

            else if(circleButton.isSelected()) {
                gc.setStroke(cpLine.getValue());
                gc.setFill(cpFill.getValue());
                circle.setCenterX(e.getX());
                circle.setCenterY(e.getY());
            }

            else if(ellipseButton.isSelected()) {
                gc.setStroke(cpLine.getValue());
                gc.setFill(cpFill.getValue());
                ellipse.setCenterX(e.getX());
                ellipse.setCenterY(e.getY());
            }

        });

        canvas.setOnMouseReleased(e -> {

             if(rectangleButton.isSelected()) {
                rectangle.setWidth(Math.abs((e.getX() - rectangle.getX())));
                rectangle.setHeight(Math.abs((e.getY() - rectangle.getY())));
                //rect.setX((rect.getX() > e.getX()) ? e.getX(): rect.getX());
                if (rectangle.getX() > e.getX()) {
                    rectangle.setX(e.getX());
                }
                //rect.setY((rect.getY() > e.getY()) ? e.getY(): rect.getY());
                if (rectangle.getY() > e.getY()) {
                    rectangle.setY(e.getY());
                }

                gc.fillRect(rectangle.getX(), rectangle.getY(), rectangle.getWidth(), rectangle.getHeight());
                gc.strokeRect(rectangle.getX(), rectangle.getY(), rectangle.getWidth(), rectangle.getHeight());

            }

             else if(circleButton.isSelected()) {
                 circle.setRadius((Math.abs(e.getX() - circle.getCenterX()) + Math.abs(e.getY() - circle.getCenterY())) / 2);

                 if (circle.getCenterX() > e.getX()) {
                     circle.setCenterX(e.getX());
                 }
                 if (circle.getCenterY() > e.getY()) {
                     circle.setCenterY(e.getY());
                 }

                 gc.fillOval(circle.getCenterX(), circle.getCenterY(), circle.getRadius(), circle.getRadius());
                 gc.strokeOval(circle.getCenterX(), circle.getCenterY(), circle.getRadius(), circle.getRadius());
             }

             else if(ellipseButton.isSelected()) {
                 ellipse.setRadiusX(Math.abs(e.getX() - ellipse.getCenterX()));
                 ellipse.setRadiusY(Math.abs(e.getY() - ellipse.getCenterY()));

                 if(ellipse.getCenterX() > e.getX()) {
                     ellipse.setCenterX(e.getX());
                 }
                 if(ellipse.getCenterY() > e.getY()) {
                     ellipse.setCenterY(e.getY());
                 }

                 gc.strokeOval(ellipse.getCenterX(), ellipse.getCenterY(), ellipse.getRadiusX(), ellipse.getRadiusY());
                 gc.fillOval(ellipse.getCenterX(), ellipse.getCenterY(), ellipse.getRadiusX(), ellipse.getRadiusY());

             }

             else if(lineButton.isSelected()) {
                 line.setEndX(e.getX());
                 line.setEndY(e.getY());
                 gc.strokeLine(line.getStartX(), line.getStartY(), line.getEndX(), line.getEndY());

             }

        });


        cpLine.setOnAction(e-> {
            gc.setStroke(cpLine.getValue());
        });
        cpFill.setOnAction(e-> {
            gc.setFill(cpFill.getValue());
        });

        gc.setLineWidth(size);



        BorderPane pane = new BorderPane();
        pane.setRight(buttons);
        pane.setCenter(canvas);
        buttons.getChildren().addAll(drawButton, eraserButton, lineButton, rectangleButton, circleButton, ellipseButton, lineSize, cpLine, cpFill);

        Scene scene = new Scene(pane, 1200, 800);

        primaryStage.setTitle("Paint");
        primaryStage.setScene(scene);
        primaryStage.show();

        }
    }

