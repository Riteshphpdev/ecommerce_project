<?php include "sidebar.php"; ?>
    
        <!-- Main Content -->
        <main class="main-content">
            <header class="main-header">
                <h1>Welcome to Your Dashboard</h1>
                <div class="user-info">
                    <span>Admin</span>
                    <button><a style="color:white;" href="logout.php">Logout</a></button>
                </div>
            </header>

            <!-- Dashboard Summary -->
            <section class="summary">
                <div class="summary-item">
                    <h3>Total Sales</h3>
                    <p>$12,345</p>
                </div>
                <div class="summary-item">
                    <h3>Products</h3>
                    <p>150</p>
                </div>
                <div class="summary-item">
                    <h3>Orders</h3>
                    <p>230</p>
                </div>
                <div class="summary-item">
                    <h3>Customers</h3>
                    <p>1,234</p>
                </div>
            </section>

            <!-- Recent Orders -->
            <section class="orders">
                <h2>Recent Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#001</td>
                            <td>John Doe</td>
                            <td>2024-08-01</td>
                            <td>Pending</td>
                            <td>$100</td>
                        </tr>
                        <tr>
                            <td>#002</td>
                            <td>Jane Smith</td>
                            <td>2024-08-02</td>
                            <td>Completed</td>
                            <td>$250</td>
                        </tr>
                        <tr>
                            <td>#003</td>
                            <td>Mike Johnson</td>
                            <td>2024-08-03</td>
                            <td>Shipped</td>
                            <td>$150</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <script src="scripts.js"></script>
</body>
</html>
