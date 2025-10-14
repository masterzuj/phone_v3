
let input;
let colorPicker;

function setup() {
    createCanvas(450, 450);
    input = createInput();
    input.position(10, 10);
    input.elt.focus();

    colorPicker = createColorPicker('#00ff00');
    colorPicker.position(10, 40);
  }
  
  function draw() {
    background(255); // weiß
    
    stroke(0, 255, 0); // Grüne Kontur
    strokeWeight(1);
    fill(0, 255, 0, 20); // Grünes, transparentes
  
  
          
              /*ellipse(width / 2, height / 2, 800, 800);
              ellipse(width / 2, height / 2, 700, 700);
              ellipse(width / 2, height / 2, 600, 600);*/
              ellipse(width / 2, height / 2, 500, 500);
          
              ellipse(width / 2, height / 2, 400, 400);
              ellipse(width / 2, height / 2, 300, 300);
              ellipse(width / 2, height / 2, 200, 200);
              ellipse(width / 2, height / 2, 100, 100);
               
              line(0, height / 2, width, height / 2);
              line(width / 2, 0, width / 2, height);
          
              line(0, 0, width, height); 
              line(0, height, width, 0);
          
  
  
    // Die rotierende Linie 
        drawRotatingLine();
      
      strokeWeight(1);
      fill(0, 0, 255); // Blaues, nicht-transparentes Füllmuster
      
      drawEllipsesFromCoordinates(ellipseCoordinates);
  }
  
  function drawRotatingLine() {
    let angle = frameCount * 0.01;
    let x1 = width / 2;
    let y1 = height / 2;
    let x2 = x1 + 400 * cos(angle);
    let y2 = y1 + 400 * sin(angle);
  
    stroke(0, 255, 0);
    strokeWeight(3);
    line(x1, y1, x2, y2);
      
  }
  
  let ellipseCoordinates = [
    //{ x: 0, y: 0 }
  ];
      
  function drawEllipsesFromCoordinates(coordinates) {
    
    for (let i = 0; i < coordinates.length; i++) {
      const coord = coordinates[i];
      
        fill(coord.color); // Set fill color to picker color
        ellipse(coord.x, coord.y, 15, 15); 

        fill(coord.color); // Set text color to picker color
        text(coord.label, coord.x + 10, coord.y);
      
    }
  }
  
  
  
  function mouseClicked() {
    
      let label = input.value();
      let color = colorPicker.color();  
      ellipseCoordinates.push({ x: mouseX, y: mouseY, label: label, color: color });
  
        console.log("Position: x = " + mouseX + ", y = " + mouseY);
  }
  