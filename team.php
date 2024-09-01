<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
    <meta charset="UTF-8">
    <title>Team Section design using Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<style>
  body{
 background-image:url(w.jpg) ;
 background-size: cover;
 background-repeat: no-repeat;
}
.team-area{
    padding-top: 5%;
}
.single-team{
    background-color: #000;
    margin-bottom: 10px;
}
.single-team:hover .social{
    cursor: pointer;
    opacity: 1;
    transform: rotateY(0deg) scale(1, 1);
}
.img-area{
    overflow: hidden;
    position: relative;
}
.img-area img{
    width: 100%;
}
.img-area:hover img{
    transform: scale(1.2)
}
.img-area img{
    transition: all 0.4s ease 0s;
}
@media (max-width: 768px){
    .img-area img{
        display: inline-block;
    }
}
.img-area .social{
    background-color: rgba(0,0,0,0.7);
    position: absolute;
    text-align: center;
    height: 100%;
    width: 100%;
    left: 0;
    top: 0;
    opacity: 0;
    transition: .5s;
    transform: rotateY(180deg) scale(0.5, 0.5);
}
.img-area .social ul{
    text-align: center;
    position: relative;
    top: 175px;
}
.img-area .social ul li a{
    border: 1px solid #fff;
    color: #fff;
    display: block;
    font-size: 20px;
    height: 40px;
    width: 40px;
    line-height: 40px;
    text-align: center;
}
.img-area .social ul li a:hover{
    background-color: #fff;
    color: #000;
    border: 1px solid transparent;
}
.img-text{
    padding: 25px;
    color: #fff;
    text-align: center;
}
.img-text h4{
    margin: 0 0 5px;
    font-size: 30px;
    font-family: bignoodletitling;
    letter-spacing: 5px;
}
.img-text h5{
    font-size: 17px;
    text-transform: uppercase;
    font-weight: bold;
}

</style>
</head>
<body>
    
    
    <div class="team-area">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="single-team">
          <div class="img-area">
            <img src="https://i.postimg.cc/mZzjhsM4/314803512-1790756264615194-1424157487079389969-n.jpg" class="img-responsive" alt="">
            <div class="social">
              <ul class="list-inline">
                <li><a href="https://www.facebook.com/estyakahmedmoyen/"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/i/flow/login?redirect_after_login=%2FIshtiakMoyen6"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.pinterest.com/estyakahmefmoyen/"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="https://www.linkedin.com/authwall?trk=bf&trkInfo=AQHDGzkIxyuy5QAAAY92WzFYUBvbuzxURMDp5A2FXEuZNgZinshsVNZa9VAq-oufAL5ttE0piz4is1DZl0iTXulkrSUiCu-ilcDZrL9z8QPGwNhKpWbUUsNS6tfS6gUwp5znNUM=&original_referer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fin%2Fmoyen-ahmed-a1912b2b4%3Futm_source%3Dshare%26utm_campaign%3Dshare_via%26utm_content%3Dprofile%26utm_medium%3Dandroid_app"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="img-text">
            <h4>Moyen Ahmed</h4>
            <h5>Front/Back-End Developer</h5>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="single-team">
          <div class="img-area">
            <img src=https://i.postimg.cc/15z9Dvmy/36267453417171780120443057244910097592769189n960x955.jpg" class="img-responsive" alt="">
            <div class="social">
              <ul class="list-inline">
                <li><a href="https://www.facebook.com/arnob.ahmed99"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="img-text">
            <h4>Arnob
                 Ahmed</h4>
            <h5>Project -Management </h5>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="single-team">
          <div class="img-area">
            <img src=https://i.postimg.cc/13ws31X7/n.jpg" class="img-responsive" alt="">
            <div class="social">
              <ul class="list-inline">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
          
          <div class="img-text">
            <h4>Sadia Afrin</h4>
            <h5> Instructor </h5>
          </div>
        </div>
      </div>
   
    </div>
  </div>
</div>
</body>
</html>
