<?php

?>


<header class=" bg-amber-200 w-full flex flex-row justify-between px-10 sticky top-0">
    <section class="flex flex-row items-center gap-x-3">
        <img src="" alt="" class=" h-8 max-h-8 max-w-8 w-8 rounded-full border border-black  bg-stone-300">
        <h2 class="text-lg font-bold"><?= $_SESSION['username'] ?> </h2>
    </section>
    <button onclick="window.location.href='backside/admin-proses.php';">Refresh</button>
    <section class="flex flex-row items-center gap-x-3">
        <h2 class="text-lg font-bold"><?= $_SESSION['role'] ?></h2>
        <form action="backside/admin-proses.php" method="POST" class="flex flex-row sm:gap-x-10 gap-x-3">
            <button class="border border-black rounded-lg bg-stone-300 hover:bg-red-500 " name="log-out">log-out</button>
        </form>
    </section>
</header>

<main>

    <table class="table">
        <thead class="sticky top-100 w-80">
            <th class="text-m bg-blue-300 rounded-l-lg px-5">no</th>
            <th class="text-m bg-blue-300 px-5">username</th>
            <th class="text-m bg-blue-300 px-5">Password</th>
            <th class="text-m bg-blue-300 px-5">role</th>
            <th class="text-m bg-blue-300 px-5 rounded-r-lg">inspect</th>

        </thead>
        <tbody class="bg-stone-200">
            <?php
            $index = 1;
            foreach (explode("!", $_SESSION['admin_out']) as $row) {
                $row = unserialize($row);
                // var_dump($row);
                if ($row == null) {
                    continue;
                }
            ?>
                <tr>
                    <td><?= $index ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['password'] ?></td>
                    <td><?= $row['role'] ?></td>
                    <td>
                        <form action="backside/admin-proses.php" method="get" class="flex flex-row items-center justify-center">
                            <button class=" rounded-full hover:bg-yellow-200" value="<?= $row['id'] ?>" name="admin-open">open</button>
                        </form>
                    </td>
                </tr>

            <?php
            $index++;
            }
            ?>
        </tbody>
    </table>
</main>