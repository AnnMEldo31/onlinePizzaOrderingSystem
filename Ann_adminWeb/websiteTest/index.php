<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Dashboard | Pizzeria Admins</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="img/logo_BW.png" alt="pizzeria logo in black and white">
            <h2>PIZZERIA Admins</h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active">
                        <span class="las la-home"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="las la-server"></span>
                        <span>Database</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="las la-chart-area"></span>
                        <span>Reports</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="las la-edit"></span>
                        <span>Edit Inventory</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="las la-user-circle"></span>
                        <span>Accounts</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                
                Dashboard
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search Here" />
            </div>

            <div class="user-wrapper">
                <div>
                    <small>Current User</small>
                    <h4>Jane Doe</h4>
                </div>
            </div>
        </header>

        <main>

            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>79</h1>
                        <span>Projects</span>
                    </div>
                    <div>
                        <span class="las la-clipboard-list"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>154</h1>
                        <span>Orders</span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>$7k</h1>
                        <span>Income</span>
                    </div>
                    <div>
                        <span class="las la-wallet"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Projects</h3>
                            <button>See all <span class="las la-arrow-right"></span></button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Project title</td>
                                            <td>Department</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>UI/UX Design</td>
                                            <td>UI Team</td>
                                            <td>
                                                <span class="status purple"></span>
                                                review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Web Development</td>
                                            <td>Frontend</td>
                                            <td>
                                                <span class="status blue"></span>
                                                in progress
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ushop App</td>
                                            <td>Mobile Team</td>
                                            <td>
                                                <span class="status orange"></span>
                                                pending
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>UI/UX Design</td>
                                            <td>UI Team</td>
                                            <td>
                                                <span class="status purple"></span>
                                                review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Web Development</td>
                                            <td>Frontend</td>
                                            <td>
                                                <span class="status blue"></span>
                                                in progress
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ushop App</td>
                                            <td>Mobile Team</td>
                                            <td>
                                                <span class="status orange"></span>
                                                pending
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>UI/UX Design</td>
                                            <td>UI Team</td>
                                            <td>
                                                <span class="status purple"></span>
                                                review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Web Development</td>
                                            <td>Frontend</td>
                                            <td>
                                                <span class="status blue"></span>
                                                in progress
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ushop App</td>
                                            <td>Mobile Team</td>
                                            <td>
                                                <span class="status orange"></span>
                                                pending
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>New Customers</h3>
                            <button>See all <span class="las la-arrow-right"></span></button>
                        </div>

                        <div class="card-body">
                            
                            <div class="customer">
                                <div class="info">
                                    <img src="img/2.jpg" width="40px" height="40px" alt="customer image">
                                    <div>
                                        <h4>Lewis H. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="img/2.jpg" width="40px" height="40px" alt="customer image">
                                    <div>
                                        <h4>Lewis H. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="img/2.jpg" width="40px" height="40px" alt="customer image">
                                    <div>
                                        <h4>Lewis H. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="img/2.jpg" width="40px" height="40px" alt="customer image">
                                    <div>
                                        <h4>Lewis H. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="img/2.jpg" width="40px" height="40px" alt="customer image">
                                    <div>
                                        <h4>Lewis H. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="img/2.jpg" width="40px" height="40px" alt="customer image">
                                    <div>
                                        <h4>Lewis H. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

</body>
</html>