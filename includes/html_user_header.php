<?php

?>
<nav class=" bg-white w-full flex relative items-center mx-auto h-20">
    <!-- logo -->
    <div class="inline-flex text-3xl">
        <a href="/"
            ><div class="hidden md:block">
                <i class="fas fa-igloo"></i>
            </div>
            <div class="block md:hidden">
                <i class="fas fa-igloo"></i>
            </div>
        </a>
    </div>

    <!-- end logo -->

    <!-- search bar -->
    <div class="hidden sm:block flex-shrink flex-grow-0 justify-start px-2">
        <div class="inline-block">
            <div class="inline-flex items-center max-w-full">
                <button class="flex items-center flex-grow-0 flex-shrink pl-2 relative w-60 border rounded-full px-1  py-1" type="button">
                    <div class="block flex-grow flex-shrink overflow-hidden">Start your search</div>
                    <div class="flex items-center justify-center relative  h-8 w-8 rounded-full">
                        <svg
                            viewBox="0 0 32 32"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                            role="presentation"
                            focusable="false"
                            style="
                                display: block;
                                fill: none;
                                height: 12px;
                                width: 12px;
                                stroke: currentcolor;
                                stroke-width: 5.33333;
                                overflow: visible;
                            "
                        >
                            <g fill="none">
                                <path
                                    d="m13 24c6.0751322 0 11-4.9248678 11-11 0-6.07513225-4.9248678-11-11-11-6.07513225 0-11 4.92486775-11 11 0 6.0751322 4.92486775 11 11 11zm8-3 9 9"
                                ></path>
                            </g>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </div>
    <!-- end search bar -->

    <!-- login -->
    <div class="flex-initial ml-auto">
      <div class="flex justify-end items-center relative">
       
        <div class="flex mr-4 items-center">
          <a href="shop.php" class="inline-block py-2 px-3 hover:bg-gray-200 rounded-full">
            <div class="flex items-center relative cursor-pointer whitespace-nowrap">Shop</div>
          </a>
          <div class="block relative">
            <button type="button" class="inline-block py-2 px-3 hover:bg-gray-200 rounded-full relative ">
              <div class="flex items-center h-5">
                <div class="_xpkakx">
                  <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; height: 16px; width: 16px; fill: currentcolor;"><path d="m8.002.25a7.77 7.77 0 0 1 7.748 7.776 7.75 7.75 0 0 1 -7.521 7.72l-.246.004a7.75 7.75 0 0 1 -7.73-7.513l-.003-.245a7.75 7.75 0 0 1 7.752-7.742zm1.949 8.5h-3.903c.155 2.897 1.176 5.343 1.886 5.493l.068.007c.68-.002 1.72-2.365 1.932-5.23zm4.255 0h-2.752c-.091 1.96-.53 3.783-1.188 5.076a6.257 6.257 0 0 0 3.905-4.829zm-9.661 0h-2.75a6.257 6.257 0 0 0 3.934 5.075c-.615-1.208-1.036-2.875-1.162-4.686l-.022-.39zm1.188-6.576-.115.046a6.257 6.257 0 0 0 -3.823 5.03h2.75c.085-1.83.471-3.54 1.059-4.81zm2.262-.424c-.702.002-1.784 2.512-1.947 5.5h3.904c-.156-2.903-1.178-5.343-1.892-5.494l-.065-.007zm2.28.432.023.05c.643 1.288 1.069 3.084 1.157 5.018h2.748a6.275 6.275 0 0 0 -3.929-5.068z"></path></svg>
                </div>
              </div>
            </button>
          </div>
        </div>

        <div class="block">
            <div class="flex space-x-2 relative"> 
                <a href="<?php echo isset($user)
                        ? 'index.php' 
                        : 'login.php' 
                    ?>" 
                    class="inline-flex items-center relative px-2 border rounded-full hover:shadow-lg">
                    <div class="flex items-center flex-grow flex-shrink-0 h-10 px-3 leading">
                        <svg
                            viewBox="0 0 32 32"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                            role="presentation"
                            focusable="false"
                            style="fill: currentcolor;"
                            class="mr-3 h-full py-2"
                        >
                            <path d="m16 .7c-8.437 0-15.3 6.863-15.3 15.3s6.863 15.3 15.3 15.3 15.3-6.863 15.3-15.3-6.863-15.3-15.3-15.3zm0 28c-4.021 0-7.605-1.884-9.933-4.81a12.425 12.425 0 0 1 6.451-4.4 6.507 6.507 0 0 1 -3.018-5.49c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5a6.513 6.513 0 0 1 -3.019 5.491 12.42 12.42 0 0 1 6.452 4.4c-2.328 2.925-5.912 4.809-9.933 4.809z"></path>
                        </svg>
                        <span class="whitespace-nowrap">
                            <?php 
                                if (isset($user)) {
                                    echo $user['username'];
                                } else { 
                                    echo "Not Login!";
                                }
                            ?>
                        </span>
                    </div>
                </a> 
                <?php if (isset($user)) { ?>
                    <a href="logout.php" class="inline-flex items-center relative px-2 border rounded-full hover:shadow-lg">
                        <div class="flex items-center flex-grow flex-shrink-0 h-10 px-3 leading">
                            <span class="whitespace-nowrap">
                                Logout
                            </span>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
      </div>
    </div>
    <!-- end login -->
</nav> 