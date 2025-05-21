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

<main class="lg:flex lg:flex-row lg:gap-x-20 ">

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
                        <form action="backside/admin-proses.php" method="post" class="flex flex-row items-center justify-center">
                            <button class=" rounded-full hover:bg-yellow-200" value="<?= $row['id'] ?>" name="admin-open">open</button>
                        </form>
                    </td>
                </tr>

            <?php
                $index++;
            }
            ?>
        </tbody>
        <tfoot class="bg-blue-300">
            <form action="backside/admin-proses.php" method="post">
                <td>new</td>
                <td><input type="text" name="usn" id="" class="rounded-lg border border-black"></td>
                <td><input type="text" name="psw" id="" class="rounded-lg border border-black"></td>
                <td><select name="role" id="" class="rounded-lg border border-black">
                    <option value="andmin">administrator</option>
                    <option value="kader">member</option>
                </select></td>
                <td class="flex flex-row items-center justify-center">
                    <button name="add" class="bg-green-500 text-center rounded-lg border border-black p-px">add new</button>
                </td>
            </form>
        </tfoot>


    </table>

    <section class="w-48 h-64 my-10 sticky">
        <div class="bg-blue-300 w-52 h-1/6 flex flex-row items-center justify-center">
            <h2 class="text-m"><?= $_SESSION['nama_admin'] ?></h2>
        </div>
        <div class="bg-amber-300 h-5/6 w-52">
            <form action="backside/admin-proses.php" method="post" class="flex flex-col p-1">
                <label for="">role</label>
                <select name="rol-in" id="">
                    <option value="kader" <?php if ($_SESSION['rol'] == "kader") {
                                                echo "selected";
                                            } ?>>member</option>
                    <option value="andmin" <?php if ($_SESSION['rol'] == "andmin") {
                                                echo "selected";
                                            } ?>>administrator</option>

                </select>
                <div class="flex flex-row gap-x-2 mt-12">
                    <button type="submit" value="<?=$_SESSION['id-in']?>" name="admin_update" class="bg-green-500 rounded-full">update</button>
                    <button name="restes" value="<?=$_SESSION['id-in']?>" class="bg-red-500 rounded-full">remove</button>
                </div>
        </div>

        </form>
        </div>
    </section>
</main>