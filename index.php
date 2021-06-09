<?php

$currentMonth = (int) date('m');
$currentYear = date('Y');
$numDaysInMonth = (int) date('t');
$firstDayOfMonth = (int) date('N', mktime(0, 0, 0, $currentMonth, 1, $currentYear));

?>
<table>
    <caption><?php echo date('m/Y') ?></caption>
    <thead><tr><th>L</th><th>M</th><th>M</th><th>J</th><th>V</th><th>S</th><th>D</th></tr></thead>
    <tbody>
        <tr>
            <?php

            if (1 !== $firstDayOfMonth) {
                echo '<td colspan="' . ($firstDayOfMonth - 1) . '"></td>';
            }
            
            for ($i = 1; $i <= $numDaysInMonth; $i++) {
                echo '<td>'.$i.'</td>';
                
                if ((int) date('N', mktime(0, 0, 0, $currentMonth, $i, $currentYear)) === 7) {
                    echo '</tr><tr>';
                }
            }
            
            $daysLeft = ($numDaysInMonth + $firstDayOfMonth) % 7;
            if (0 !== $daysLeft) {
                echo '<td colspan="' . ((7 - $daysLeft) + 1) . '"></td>';
            }

            ?>
        </tr>
    </tbody>
</table>
