

<?php if($_SERVER['SCRIPT_NAME'] !== '/Mytest/newsletter.php'): ?>
    <div class="container">
        <h1>S'inscrire à la newsletter</h1>
        <form action="newsletter.php" method="post" class="form-inline">
            <div class="form-group">
                <input type="email" name="email" placeholder="Entrer votre email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
    </div>
<?php endif ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>