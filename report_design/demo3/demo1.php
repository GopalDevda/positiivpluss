<!DOCTYPE html>
<html>
  <body>
    <div>
    <canvas id="canvas" width="500" height="200" style="border: 1px solid black;"></canvas>
  </div>
  <div style="margin-top:5px">
    <span>Size: </span>
    <input type="range" min="1" max="50" value="10" class="size" id="sizeRange" />
  </div>
  <div style="margin-top:5px">
    <span>Color: </span>
    <input type="radio" name="colorRadio" value="black" checked />
    <label for="black">Black</label>
    <input type="radio" name="colorRadio" value="white" />
    <label for="black">White</label>
    <input type="radio" name="colorRadio" value="red" />
    <label for="black">Red</label>
    <input type="radio" name="colorRadio" value="green" />
    <label for="black">Green</label>
    <input type="radio" name="colorRadio" value="blue" />
    <label for="black">Blue</label>
  </div>
  <div style="margin-top:5px">
    <button id="clear">Clear</button>
  </div>
  <br />
  <input id="upload" type="file" accept="image/*" />
  <p> Start drawing on the blank canvas or upload an image and use the brush to modify on it </p>
    <script src="src/index.js"></script>
    <script > 
function drawOnImage(image = null) {
  const canvasElement = document.getElementById("canvas");
  
  const context = canvasElement.getContext("2d");
  
  // if an image is present,
  // the image passed as a parameter is drawn in the canvas
  if (image) {
    const imageWidth = image.width;
    const imageHeight = image.height;
    // rescaling the canvas element
    canvasElement.width = imageWidth;
    canvasElement.height = imageHeight;
    context.drawImage(image, 0, 0, imageWidth, imageHeight);
  }
  
  let isDrawing;
  canvasElement.onmousedown = (e) => {
    isDrawing = true;
    context.beginPath();
    context.lineWidth = 10;
    context.strokeStyle = "black";
    context.lineJoin = "round";
    context.lineCap = "round";
    context.moveTo(e.clientX, e.clientY);
  };
  
  canvasElement.onmousemove = (e) => {
    if (isDrawing) {      
      context.lineTo(e.clientX, e.clientY);
      context.stroke();      
    }
  };
  
  canvasElement.onmouseup = function () {
    isDrawing = false;
    context.closePath();
  };
}

</script>
  </body>
</html>
