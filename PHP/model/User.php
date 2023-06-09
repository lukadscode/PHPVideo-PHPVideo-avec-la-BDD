    <?php
    class User {
        public $db;

        function __construct() {
            $dsn = 'mysql:host=127.0.0.1;dbname=phpvideo';
            $username = 'root';
            $password = '';
            $this->db = new PDO($dsn, $username, $password);
        }

        function create($prenom, $email) {
            $stmt = $this->db->prepare("INSERT INTO users (prenom, email) VALUES (?, ?)");
            $stmt->execute([$prenom, $email]);
            return $this->db->lastInsertId();
        }

        function read($id) {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id=?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        function all() {
            $stmt = $this->db->prepare("SELECT * FROM users");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        

        function update($id, $prenom, $email) {
            $stmt = $this->db->prepare("UPDATE users SET prenom=?, email=? WHERE id=?");
            $stmt->execute([$prenom, $email, $id]);
            return $stmt->rowCount();
        }

        function delete($id) {
            $stmt = $this->db->prepare("DELETE FROM users WHERE id=?");
            $stmt->execute([$id]);
            return $stmt->rowCount();
        }
    }
?>