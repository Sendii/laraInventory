<!DOCTYPE html>
<html>

<head>
    <title>Not Found.</title>
</head>

<body>
    <!-- Error One -->

    <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet' type='text/css'>

    <body>
        <style type="text/css">
            * {
                font-family: 'PT Sans Caption', sans-serif, 'arial', 'Times New Roman';
            }
            /* Error Page */
            
            body {
                background-color: #e4e4e4;
            }
            
            .error .clip .shadow {
                height: 180px;
                /*Contrall*/
            }
            
            .error .clip:nth-of-type(2) .shadow {
                width: 130px;
                /*Contrall play with javascript*/
            }
            
            .error .clip:nth-of-type(1) .shadow,
            .error .clip:nth-of-type(3) .shadow {
                width: 250px;
                /*Contrall*/
            }
            
            .error .digit {
                width: 150px;
                /*Contrall*/
                height: 150px;
                /*Contrall*/
                line-height: 150px;
                /*Contrall*/
                font-size: 120px;
                font-weight: bold;
            }
            
            .error h2
            /*Contrall*/
            
            {
                font-size: 32px;
            }
            
            .error .msg
            /*Contrall*/
            
            {
                top: -190px;
                left: 30%;
                width: 80px;
                height: 80px;
                line-height: 80px;
                font-size: 27px;
            }
            
            .error span.triangle
            /*Contrall*/
            
            {
                top: 70%;
                right: 0%;
                border-left: 20px solid #1aa2f1;
                border-top: 15px solid transparent;
                border-bottom: 15px solid transparent;
            }
            
            .error .container-error-404 {
                margin-top: 10%;
                position: relative;
                height: 250px;
                padding-top: 40px;
            }
            
            .error .container-error-404 .clip {
                display: inline-block;
                transform: skew(-45deg);
            }
            
            .error .clip .shadow {
                overflow: hidden;
            }
            
            .error .clip:nth-of-type(2) .shadow {
                overflow: hidden;
                position: relative;
                box-shadow: inset 20px 0px 20px -15px rgba(150, 150, 150, 0.8), 20px 0px 20px -15px rgba(150, 150, 150, 0.8);
            }
            
            .error .clip:nth-of-type(3) .shadow:after,
            .error .clip:nth-of-type(1) .shadow:after {
                content: "";
                position: absolute;
                right: -8px;
                bottom: 0px;
                z-index: 9999;
                height: 100%;
                width: 10px;
                background: linear-gradient(90deg, transparent, rgba(113, 113, 156, 0.8), transparent);
                border-radius: 50%;
            }
            
            .error .clip:nth-of-type(3) .shadow:after {
                left: -8px;
            }
            
            .error .digit {
                position: relative;
                top: 8%;
                color: white;
                background: #3c8dbc;
                border-radius: 50%;
                display: inline-block;
                transform: skew(45deg);
            }
            
            .error .clip:nth-of-type(2) .digit {
                left: -10%;
            }
            
            .error .clip:nth-of-type(1) .digit {
                right: -20%;
            }
            
            .error .clip:nth-of-type(3) .digit {
                left: -20%;
            }
            
            .error h2 {
                color: #A2A2A2;
                font-weight: bold;
                padding-bottom: 20px;
            }
            
            .error .msg {
                position: relative;
                z-index: 9999;
                display: block;
                background: #1aa2f1;
                color: #382f2f;
                border-radius: 50%;
                font-style: italic;
            }
            
            .error .triangle {
                position: absolute;
                z-index: 999;
                transform: rotate(45deg);
                content: "";
                width: 0;
                height: 0;
            }
            /* Error Page */
            
            @media(max-width: 767px) {
                /* Error Page */
                .error .clip .shadow {
                    height: 100px;
                    /*Contrall*/
                }
                .error .clip:nth-of-type(2) .shadow {
                    width: 80px;
                    /*Contrall play with javascript*/
                }
                .error .clip:nth-of-type(1) .shadow,
                .error .clip:nth-of-type(3) .shadow {
                    width: 100px;
                    /*Contrall*/
                }
                .error .digit {
                    width: 80px;
                    /*Contrall*/
                    height: 80px;
                    /*Contrall*/
                    line-height: 80px;
                    /*Contrall*/
                    font-size: 52px;
                }
                .error h2/*Contrall*/
                {
                    font-size: 24px;
                }
                .error .msg/*Contrall*/
                {
                    top: -110px;
                    left: 15%;
                    width: 40px;
                    height: 40px;
                    line-height: 40px;
                    font-size: 18px;
                }
                .error span.triangle/*Contrall*/
                {
                    top: 70%;
                    right: -3%;
                    border-left: 10px solid #535353;
                    border-top: 8px solid transparent;
                    border-bottom: 8px solid transparent;
                }
                .error .container-error-404 {
                    height: 150px;
                }
                /* Error Page */
            }
            
            .overlay {
                position: relative;
                z-index: 20;
            }
            /*done*/
            
            .ground-color {
                background: #e4e4e4;
            }
            /*done*/
            
            .item-bg-color {
                background: #d8d8d8
            }
            /*done*/
            /* Padding Section*/
            
            .padding-top {
                padding-top: 10px;
            }
            /*done*/
            
            .padding-bottom {
                padding-bottom: 10px;
            }
            /*done*/
            
            .padding-vertical {
                padding-top: 10px;
                padding-bottom: 10px;
            }
            
            .padding-horizontal {
                padding-left: 10px;
                padding-right: 10px;
            }
            
            .padding-all {
                padding: 10px;
            }
            /*done*/
            
            .no-padding-left {
                padding-left: 0px;
            }
            /*done*/
            
            .no-padding-right {
                padding-right: 0px;
            }
            /*done*/
            
            .no-vertical-padding {
                padding-top: 0px;
                padding-bottom: 0px;
            }
            
            .no-horizontal-padding {
                padding-left: 0px;
                padding-right: 0px;
            }
            
            .no-padding {
                padding: 0px;
            }
            /*done*/
            /* Padding Section*/
            /* Margin section */
            
            .margin-top {
                margin-top: 10px;
            }
            /*done*/
            
            .margin-bottom {
                margin-bottom: 10px;
            }
            /*done*/
            
            .margin-right {
                margin-right: 10px;
            }
            /*done*/
            
            .margin-left {
                margin-left: 10px;
            }
            /*done*/
            
            .margin-horizontal {
                margin-left: 10px;
                margin-right: 10px;
            }
            /*done*/
            
            .margin-vertical {
                margin-top: 10px;
                margin-bottom: 10px;
            }
            /*done*/
            
            .margin-all {
                margin: 10px;
            }
            /*done*/
            
            .no-margin {
                margin: 0px;
            }
            /*done*/
            
            .no-vertical-margin {
                margin-top: 0px;
                margin-bottom: 0px;
            }
            
            .no-horizontal-margin {
                margin-left: 0px;
                margin-right: 0px;
            }
            
            .inside-col-shrink {
                margin: 0px 20px;
            }
            
            hr {
                margin: 0px;
                padding: 0px;
                border-top: 1px dashed #999;
            }
        </style>
        <center>
            <div class="error">
                <div class="container-floud">
                    <div class="col-xs-12 ground-color text-center">
                        <div class="container-error-404">
                            <div class="clip">
                                <div class="shadow"><span class="digit thirdDigit"></span></div>
                            </div>
                            <div class="clip">
                                <div class="shadow"><span class="digit secondDigit"></span></div>
                            </div>
                            <div class="clip">
                                <div class="shadow"><span class="digit firstDigit"></span></div>
                            </div>
                            <div class="msg">Sorry.<span class="triangle"></span></div>
                        </div>
                        <h2 class="h1" style="font-size:35px; font-c "><b>Sorry, Page not found.</b></h2>
                        <h2><b><a class="h1" style="font-size:25px; font-c " href="{{url('/')}}">Back to Homepages</a></b></h2>
                    </div>
                </div>
            </div>
        </center>
        <script type="text/javascript">
            function randomNum() {
                "use strict";
                return Math.floor(Math.random() * 100) + 1;
            }
            var loop1, loop2, loop3, time = 30,
                i = 0,
                number, selector3 = document.querySelector('.thirdDigit'),
                selector2 = document.querySelector('.secondDigit'),
                selector1 = document.querySelector('.firstDigit');
            loop3 = setInterval(function() {
                "use strict";
                if (i > 70) {
                    clearInterval(loop3);
                    selector3.textContent = 4;
                } else {
                    selector3.textContent = randomNum();
                    i++;
                }
            }, time);
            loop2 = setInterval(function() {
                "use strict";
                if (i > 95) {
                    clearInterval(loop2);
                    selector2.textContent = 0;
                } else {
                    selector2.textContent = randomNum();
                    i++;
                }
            }, time);
            loop1 = setInterval(function() {
                "use strict";
                if (i > 115) {
                    clearInterval(loop1);
                    selector1.textContent = 4;
                } else {
                    selector1.textContent = randomNum();
                    i++;
                }
            }, time);
        </script>
    </body>
</html>