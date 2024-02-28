<!-- import lenis from cdn -->
<script src="https://unpkg.com/@studio-freight/lenis@1.0.39/dist/lenis.min.js"></script>

<script>

    // lenis scroll

    const lenis = new Lenis()

    lenis.on('scroll', (e) => {
        console.log(e)
    })

    function raf(time) {
        lenis.raf(time)
        requestAnimationFrame(raf)
    }

    requestAnimationFrame(raf)


</script>