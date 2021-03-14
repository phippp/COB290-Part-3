<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="{{ asset('css/client_style.css')}}">
        
    </head>
    <body>
        <nav>
            <ul> 
                <li class="company_title">
                    <a>Make-It-All</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="">Dashboard</a>
                </li>
                <li>
                    <a href="">Register</a>
                </li>
            </ul>
            <ul class="profile">
                <li>
                    <a>Dropdown</a>
                </li>
            </ul>
        </nav>

        <p class="summary">Your Summary</p>
        <div class="container">
            <div class="info">
                <p>Cases Assigned Today</p>
                <h1>0</h1>
            </div>
            <div class="info">
                <p>Cases Solved by You</p>
                <h1>0</h1>
            </div>
            <div class="info">
                <p>Cases Left to Resolve</p>
                <h1>0</h1>
            </div>
            <div class="info">
                <p>Importance Level</p>
                <table>
                    <tr>
                        <td class="header">Low</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td class="header">Medium</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td class="header">High</td>
                        <td>1</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="main">
            <p class="cases">Cases Issued</p>

            <div class="search">
                <form>
                    <label for="type">Search By:</label>
                    <select name="type" id="type">
                        <option value="date">Date</option>
                        <option value="prolemid">Problem ID</option>
                        <option value="title">Problem Title</option>
                        <option value="category">Category</option>
                        <option value="status">Status</option>
                        <option value="importance">Importance</option>
                        <option value="assigned">Assigned To</option>
                    </select>
                    <input type="text" id="search" name="seach">
                    <button>Search</button>
                </form>
            </div>
            <br/>
            <table class="data">
                <tr>
                    <th class="header">Date</th>
                    <th class="header">Problem ID</th>
                    <th class="header">Problem Title</th>
                    <th class="header">Category</th>
                    <th class="header">Status</th>
                    <th class="header">Importance</th>
                    <th class="header">Assigned to</th>
                </tr>
                <tr>

                </tr>
            </table>
        </div>

    </body>
</html>