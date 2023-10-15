<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dirgahayu Indonesia</title>
  <style>
    .flag:before {
      position: absolute;
      content: "";
      height: 240px;
      left: -5px;
      top: -3px;
      width: 6px;
      border-right: 1px solid white;
      border-radius: 3px;
      background-color: #444;
      box-shadow: -3px 3px 8px 0px rgba(0, 0, 0, 0.04);
    }

    .container {
      background-image: linear-gradient(white 50px, #eee);
      padding-bottom: 20px;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .flag {
      position: relative;
      display: inline-block;
      margin: 2em 3em 120px;
      width: 120px;
      height: 120px;
      border: 1px solid #bbb;
      border-left-color: white;
      box-sizing: border-box;
      box-shadow: 2px 5px 14px 0px rgba(0, 0, 0, 0.4);
      backface-visibility: hidden;
      perspective: 1000;
      transform-style: preserve3d;
      transform-origin: 0 250px;
      transform: translate3d(0, 0, 0) rotateZ(5deg) rotateY(-22deg);
      animation-name: wave;
      animation-duration: 8s;
      animation-timing-function: cubic-bezier(0.16, 0.14, 0.82, 0.73);
      animation-timing-function: linear;
      animation-literation-count: infinite;
    }

    .flag:nth-child(odd) {
      animation-delay: 1s;
    }

    .flag.rect {
      width: 168px;
    }

    .flag-pattern.id {
      background-color: #ffffff;
      background-image: linear-gradient(rgb(255, 0, 0) 50%, transparent 50%);
    }

    .flag-pattern {
      position: absolute;
      width: 100%;
      height: 100%;
      box-sizing: border-box;
      -webkit-box-reflect: below 60px -webkit-gradient(linear, left top, left bottom, from(transparent),
          color-stop(70%, transparent)to(rgba(255, 255, 255, 0.05)));
    }

    .flag-wave {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: -webkit-gradient(linear,
          0 -25%,
          100% top,
          color-stop(0%, rgba(255, 255, 255, 0)),
          color-stop(20%, rgba(255, 255, 255, 0)),
          color-stop(30%, rgba(0, 0, 0, 0.04)),
          color-stop(40%, rgba(255, 255, 255, 0.2)),
          color-stop(60%, rgba(255, 255, 255, 0)),
          color-stop(65%, rgba(255, 255, 255, 0.2)),
          color-stop(80%, rgba(0, 0, 0, 0.05)),
          color-stop(100%, rgba(255, 255, 255, 0)),
        );
      background-size: 200px;
      animation-name: flutter;
      animation-duration: 8s;
      animation-timing-function: cubic-bezier(0.16, 0.14, 0.82, 0.73);
      -webkit-animation-literation-count: infinite;
    }

    @-webkit-keyframes flutter {
      0% {
        background-position: -200% 0px;
      }

      30% {
        background-position: -60% 5px;
      }

      70% {
        background-position: 70% -5px;
      }

      100% {
        background-position: 200% 0px;
      }
    }

    @keyframes wave {
      0% {
        box-shadow: 4px 5px 5px 0 rgba(0, 0, 0, 0.1);
        -webkit-transform: translate3d(0, 0, 0) rotateZ(5deg) rotateY(22deg);
      }

      20% {
        box-shadow: 4px 5px 15px 0 rgba(0, 0, 0, 0.1);
        -webkit-transform: translate3d(0, 0, 0) rotateZ(5deg) rotateY(0deg);
      }

      40% {
        box-shadow: 4px 5px 20px 0 rgba(0, 0, 0, 0.4);
        -webkit-transform: translate3d(0, 0, 0) rotateZ(6deg) rotateY(-22deg);
      }

      60% {
        box-shadow: 4px 5px 5px 0 rgba(0, 0, 0, 0.1);
        -webkit-transform: translate3d(0, 0, 0) rotateZ(5deg) rotateY(0deg);
      }

      80% {
        box-shadow: 4px 5px 5px 0 rgba(0, 0, 0, 0.3);
        -webkit-transform: translate3d(0, 0, 0) rotateZ(5deg) rotateY(16deg);
      }

      100% {
        box-shadow: 4px 5px 5px 0 rgba(0, 0, 0, 0.1);
        -webkit-transform: translate3d(0, 0, 0) rotateZ(5deg) rotateY(22deg);
      }
    }
    h1 {
      text-align: center;
      color: white;
      text-shadow: 2px 2px 4px red, -2px -2px 4px red;
    }
    h3 {
      text-align: center;
      color: white;
      text-shadow: 2px 2px 4px red, -2px -2px 4px red;
    }
  </style>
</head>

<body>
  <h3>RSUD dr. H. Andi Abdurrahman Noor Mengucapkan:</h3>
  <h1>DIRGAHAYU KE 78 INDONESIA</h1>
  <div class="container">
    <div class="flag rect">
      <div class="flag-pattern id"></div>
      <div class="flag-wave"></div>
    </div>
  </div>

</body>
</html>