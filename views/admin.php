<?php

?>


<header class=" bg-amber-200 w-full flex flex-row justify-between px-10">
    <section class="flex flex-row items-center gap-x-3" >
        <img src="" alt="" class=" h-8 w-8 rounded-full border border-black  bg-stone-300">
        <h2 class="text-lg font-bold"><?= $_SESSION['username'] ?> </h2>
    </section>
    <section>
        <form action="backside/admin-proses.php" method="POST" class="flex flex-row sm:gap-x-10 gap-x-3">
            <h2 class="text-lg font-bold"><?= $_SESSION['role'] ?></h2>
            <button class="border border-black rounded-lg bg-stone-300 hover:bg-red-500 " name="log-out">log-out</button>
        </form>
    </section>
</header>

<main>

<table>
    <thead class="sticky top-10">
        <th class="text-m bg-blue-300 rounded-l-lg">no</th>
        <th class="text-m bg-blue-300">username</th>
        <th class="text-m bg-blue-300">Password</th>
        <th class="text-m bg-blue-300 rounded-r-lg">role</th>
        
    </thead>
    <tbody class="bg-stone-200"></tbody>
</table>
</main>