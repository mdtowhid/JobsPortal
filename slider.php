<style>
    .in-slides .slides h3,
    .in-slides .slides p{
        color: white;
    }
</style>
<div class="in-slides">
    <div class="slides">
        <div class="slides-image">
            <img src="./images/boy.jpg" alt="">
        </div>
        <div class="slides-details text-muted text-center">
            <h3>Mark Doe</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et sint eveniet, quam amet est molestias? Asperiores a optio ratione quam temporibus placeat quisquam libero, eligendi neque doloribus, necessitatibus repellat ullam!</p>
        </div>
    </div>
    
    <div class="slides">
        <div class="slides-image">
            <img src="./images/boy.jpg" alt="">
        </div>
        <div class="slides-details text-muted text-center">
            <h3>Root</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et sint eveniet, quam amet est molestias? Asperiores a optio ratione quam temporibus placeat quisquam libero, eligendi neque doloribus, necessitatibus repellat ullam!</p>
        </div>
    </div>
    
    <div class="slides">
        <div class="slides-image">
            <img src="./images/avatar_hat.jpg" alt="">
        </div>
        <div class="slides-details text-muted text-center">
            <h3>Devid Luis</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et sint eveniet, quam amet est molestias? Asperiores a optio ratione quam temporibus placeat quisquam libero, eligendi neque doloribus, necessitatibus repellat ullam!</p>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.in-slides > div:gt(0)').hide();

        setInterval(() => {
            $('.in-slides > div:first')
                .fadeOut(1000)
                .next()
                .fadeIn(1000)
                .end()
                .addClass('active')
                .appendTo('.in-slides')
        }, 6000);     
    });
</script>