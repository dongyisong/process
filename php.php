<?php
	$pids = array();
        $child_pid = pcntl_fork();
        echo 'rrrrr'.$child_pid.PHP_EOL;
        if ($child_pid == -1) {
            throw new \Exception(__METHOD__ . "|" . __LINE__ . ":fork() error");
        } else if ($child_pid) {
            echo 'iiii'.$child_pid.PHP_EOL;
            exit(0);
        } else {
            for ($i = 0; $i < 3; $i++) {
                $child_pid = pcntl_fork();
                if ($child_pid) {
                    $pids[] = $child_pid;
                    sleep(5);
                    print_r($pids);
                    echo "\n";
                } else {
                    break;
                }
            }
        }
        while (1) {
            echo 'tttttt';
            sleep(1);
        }

?>
