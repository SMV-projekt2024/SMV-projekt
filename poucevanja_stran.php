<?php 
    include("glava.php");
?>
<div class="mainContainer">
    <div class="smeriContainer">
        <div class="createBox">
        <div class="innerCreateBox">
 


<?php
require_once "includes/database-inc.php";
require_once "includes/functions-inc.php";

$users = [];
$user_stmt = $conn->prepare("SELECT UsersId, UsersIme, UsersPriimek FROM users WHERE UsersRole = 'creator'");
$user_stmt->execute();
$result = $user_stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}
$user_stmt->close();

$subjects = [];
$subject_stmt = $conn->prepare("SELECT id_predmet, kratica FROM predmeti");
$subject_stmt->execute();
$result = $subject_stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $subjects[] = $row;
}
$subject_stmt->close();

$access = [];
$access_stmt = $conn->prepare("SELECT id_user, id_predmet FROM poucevanja");
$access_stmt->execute();
$result = $access_stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $access[$row['id_user']][$row['id_predmet']] = true;
}
$access_stmt->close();
?>

    <h1>Uredi dostop</h1>
    <table class="dovoljenjaTabela">
        <thead>
            <tr>
                <th>User</th>
                <?php foreach ($subjects as $subject): ?>
                    <th><?php echo $subject['kratica']; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php 
                        echo $user['UsersIme'] . " ". $user['UsersPriimek']; 
                    ?></td>
                    <?php foreach ($subjects as $subject): ?>
                        <td>
                            <?php
                            $hasAccess = isset($access[$user['UsersId']][$subject['id_predmet']]);
                            if ($hasAccess): ?>
                                <!-- Odstrani -->
                                <form action="includes/dodaj_odstrani_dovoljenje.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="action" value="remove">
                                    <input type="hidden" name="id_user" value="<?php echo $user['UsersId']; ?>">
                                    <input type="hidden" name="id_predmet" value="<?php echo $subject['id_predmet']; ?>">
                                    <button type="submit">Odstrani dostop</button>
                                </form>
                            <?php else: ?>
                               <!-- Dodaj-->
                                <form action="includes/dodaj_odstrani_dovoljenje.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="action" value="add">
                                    <input type="hidden" name="id_user" value="<?php echo $user['UsersId']; ?>">
                                    <input type="hidden" name="id_predmet" value="<?php echo $subject['id_predmet']; ?>">
                                    <button type="submit">Dodaj dostop</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

           
    </div>   
    </div>
</div>

</div>
<!-- NOGA -->
<?php 
    include("noga.php");
?>