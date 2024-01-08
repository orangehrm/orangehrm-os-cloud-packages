<?php
/**
 * OrangeHRM AWS CLI assists AWS Marketplace Subscribers
 * with managing their installation of OrangeHRM Starter
 * Copyright (C) 2024 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM AWS CLI is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OrangeHRM AWS CLI is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OrangeHRM AWS CLI.  If not, see <https://www.gnu.org/licenses/>.
 */
?>

<html>
    <head>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;0,6..12,700;0,6..12,800;0,6..12,900;0,6..12,1000;1,6..12,200;1,6..12,300;1,6..12,400;1,6..12,500;1,6..12,600;1,6..12,700;1,6..12,800;1,6..12,900;1,6..12,1000&display=swap');

            div {
                margin: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                font-family: 'Nunito Sans', sans-serif;
                text-align: center;
            }

            body {
                background-color: #ffae27;
                background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMy4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAxNzAuNCAxODkuOCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMTcwLjQgMTg5Ljg7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQoJLnN0MHtmaWxsOiNGNTgzMjE7fQ0KCS5zdDF7ZmlsbDojMDlBNzUyO30NCgkuc3Qye2ZpbGw6I0IwRENDNDt9DQo8L3N0eWxlPg0KPHRpdGxlPk9yYW5nZUhSTV9Mb2dvPC90aXRsZT4NCjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik03Ni42LDYxLjFjMy40LTEuMyw2LjYtMi4xLDkuNi0zYzctMi4xLDE0LTEuOCwyMS4xLTAuM2MxMCwyLjEsMTkuNCw2LjQsMjcuNiwxMi43DQoJYzguNyw2LjcsMTQuMywxNS41LDE3LjYsMjUuOWM2LjQsMjAuNywxLjksNDUuNS0xMi4zLDYyYy0xMy4zLDE1LjUtMzAsMjQuOS01MC40LDI3LjVjLTE3LjYsMi4yLTM0LTEuNC00OS41LTkuNw0KCWMtMTEuMy02LTIxLTE0LjctMjguMS0yNS40QzUuNiwxNDEsMS40LDEzMC41LDAuMywxMTguOGMtMS41LTE2LjIsMy40LTMwLjMsMTQuMi00Mi40YzMuNC0zLjgsNy4zLTcuMSwxMS43LTkuOA0KCWM3LjQtNC42LDE2LjMtNi4xLDI0LjgtNC4zYzkuMiwxLjksMTcuNiw1LjMsMjUsMTEuMWM1LjQsNC4zLDkuNSw5LjQsMTEuNCwxNi4yYzAuMiwwLjksMC40LDEuOCwwLjYsMi43YzAuMSwwLjUsMC4zLDEuMS0wLjQsMS40DQoJcy0xLjQsMC41LTItMC4zYy0wLjUtMC42LTAuOS0xLjItMS40LTEuN0M3Ni4yLDgyLjUsNjUsNzYuNiw1Mi45LDc1LjNjLTMuMS0wLjQtNi4yLTAuMy05LjIsMC4yYy00LjIsMC43LTguMSwyLjctMTEuMSw1LjgNCgljLTguNSw4LjUtMTMuMywxOC43LTEyLjUsMzAuOWMwLjYsOC41LDMuOSwxNi4xLDksMjIuOWM4LjIsMTAuOSwxOS44LDE4LjcsMzIuOSwyMi4zYzE2LjcsNC43LDMzLDMuNiw0OC41LTQuNA0KCWM4LTQuMSwxNC43LTkuNiwxOS4yLTE3LjZjMy4zLTUuOSw1LjQtMTIuMyw2LjMtMTljMC43LTUuMSwwLjctMTAuMywwLjEtMTUuNGMtMC44LTUuOC0zLjMtMTEuMi03LTE1LjZjLTYtNy41LTEzLjktMTMuMy0yMi44LTE2LjgNCgljLTcuMy0zLTE1LTQuNy0yMi43LTYuMUM4MS40LDYyLjEsNzkuMiw2MS42LDc2LjYsNjEuMXoiLz4NCjxwYXRoIGNsYXNzPSJzdDEiIGQ9Ik0xMjIuMSwxMmMtMTAsNC4yLTE5LjcsOS4xLTI5LDE0LjdjLTcuMSw0LjEtMTMuOCw4LjktMjAuMSwxNC4xYy0xLjMsMS4xLTIuNSwyLjItMy45LDMuNQ0KCWMtMC4yLTEuNC0wLjItMi45LDAtNC4zQzY5LjUsMzQsNzEsMjgsNzMuNCwyMi40YzMuMi03LjIsOS4xLTEyLjksMTYuNS0xNS43YzguMi0zLjEsMTYuOC01LjIsMjUuNi02YzYuMy0wLjcsMTIuNi0wLjksMTguOS0wLjYNCgljMy41LDAuMSw2LjksMC4zLDEwLjMsMC45YzAuMiwwLjMsMC4yLDAuNywwLDFjLTUuOCwxMi0xMiwyMy43LTIwLDM0LjRjLTEsMS4zLTIsMi41LTMsMy44Yy0zLjIsMy45LTcuNiw2LjgtMTIuNCw4LjMNCgljLTYuNSwyLTEzLjEsMy40LTE5LjgsNC4zYy0zLjIsMC40LTYuNCwwLjgtOS42LDEuMmMtMC42LDAuMS0xLjEsMC4xLTEuNywwYzAuMi0wLjksMC42LTEuNywxLjItMi40YzQtNi42LDkuMy0xMi4yLDE0LjktMTcuMw0KCWM4LjMtNy42LDE3LjQtMTQuMSwyNi43LTIwLjRjMC42LTAuNCwxLjEtMC44LDEuNi0xLjJjMC42LTAuMSwxLjEtMC42LDEuMy0xLjJDMTIzLjIsMTEuMywxMjIuNiwxMS41LDEyMi4xLDEyeiIvPg0KPHBhdGggY2xhc3M9InN0MiIgZD0iTTEyMi4xLDEyYzAuNS0wLjUsMS4xLTAuNywxLjgtMC43Yy0wLjIsMC42LTAuNiwxLjEtMS4zLDEuMkwxMjIuMSwxMnoiLz4NCjwvc3ZnPg0K');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center; 
                background-size: 30%;
            }

            .heading {
                font-size: 30px;
                font-weight: 900;
                color: #4b494a;
            }

            .body {
                font-size: 20px;
                font-weight: 600;
            }

            .info {
                font-size: 15px;
                font-weight: 400;
            }

            .email {
                font-weight: 900;
                font-style: italic;
            }

        </style>
    </head>
<body>
    <div>
        <p class="heading">SYSTEM IS UNDER MAINTENANCE</p>
        <p class="body">This system is being installed or upgraded!</p>
        <p class="info">
            If you're still seeing this page, clear your browser cache and refresh. <br/>
            For any other concerns, please contact your system administrator<br/><br/>
            Or can reach out to us at <br />
            <span class="email">ossupport@orangehrm.com</span>
        </p>
    </div>
</body>
</html>
