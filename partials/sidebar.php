<aside>
    <section class="login">'
        <?php
            if (!isset($_SESSION['nama'])) {
                echo '<h2>Login</h2>
                <form action="loginprocess.php" method="POST">
                    <table>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="user"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="login" value="login"></td>
                        </tr>
                    </table>
                </form>';
            }else {
                echo '<h4>Selamat datang: '.$_SESSION['nama'].'</h4>
                <a href="logout.php">Logout</a>';
            }
        ?>
        
        <p><?php
            if (isset($_GET['pesan'])) {
                echo $_GET['pesan'];
            }
        ?></p>
    </section>
    <section class="popular">
        <h2>Masakan Populer</h2>
        <a href="">Sayur Sop</a>
        <a href="">Sayur Asem</a>
        <a href="">Sayur Lodeh</a>
        <a href="">Sayur Bayam</a>
    </section>
    <section class="contact">
        <h2>Kontak</h2>
        <p>Warung Tegal<br/> di seluruh indonesia</p>
    </section>
</aside><!--end side--->