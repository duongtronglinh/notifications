<template>
    <li class="nav-item dropdown">
        <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-globe"></i> Notification 
            <span class="badge badge-danger" id="count-notification">
                {{ lessons.length }}
            </span>
            <span class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a href="#" class="dropdown-item" v-for="lesson in lessons">
                {{ lesson.data }}
            </a>

            <a href="#" class="dropdown-item" v-if="lessons.length==0">
                Notification
            </a>
        </div>
    </li>
</template>
<script>
    export default {
        props: ['lessons'],
    }
</script>