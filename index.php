<?php
//include_once 'config.php';
include_once 'handler.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
  </head>
  <body>
  <div class="conatiner"> <div class="row"> <div class="col-6 p-4 m-4" style=" background-color: #a9c; border: solid 2px #fff; "><form action="handler.php" method="POST" enctype="multipart/form-data">
      <p>
        Upload an image:
        <input 
          type="file"
          name="myFile[]"
          accept="image/png, .jpeg, .jpg, image/gif"
          multiple class="btn-dark"
        />
      </p>
      <button type="submit" name="submit" value="submit" class="btn-dark" style="border-radius: 7px">Check and upload file</button>
    </form></div></div> <div class="row"><div class="col-6  p-4 m-4"> <div><form action=""> 
    <label for="target">Target format:</label><select
        class="form-control"
        id="inputTarget"
        name="target"
        multiple
      >
        <option value="bmp">BMP</option>
        <option value="eps">EPS</option>
        <option value="gif">GIF</option>
        <option value="exr">HDR/EXR</option>
        <option value="ico">ICO</option>
        <option value="jpg">JPG</option>
        <option selected="selected" value="png">PNG</option>
        <option value="svg">SVG</option>
        <option value="tga">TGA</option>
        <option value="tiff">TIFF</option>
        <option value="wbmp">WBMP</option>
        <option value="webp">WebP</option>
      </select>

      <label class="bg-dark text-light mt-4 p-1" >Change size:</label> <br>

      <label>Width:</label>

      <input
        placeholder="1 - 65000"
        class="form-control "
        id="inputWidth"
        name="width"
        type="number"
        min="1"
        max="65000"
      />
      

      <label>Height:</label>

      <input
        placeholder="1 - 65000"
        class="form-control"
        id="inputHeight"
        name="height"
        type="number"
        min="1"
        max="65000"
      />
      </form>
      <button class="btn-dark mt-3 " style="border-radius: 7px">Start resize</button>
      </div></div></div>
    </div>
    

  </body>
</html>