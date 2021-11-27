<template>
    <div class="flex flex-col items-center py-4">
        <NewPost/>
        <p v-if="loading">Loading posts...</p>
        <Post v-else v-for="post in posts.data" :key="post.data.post_id" :post="post"/>
        <p v-if=" ! loading && posts.data.length < 1">No posts found. Get started...</p>
    </div>
</template>

<script>
    import NewPost from "../components/NewPost";
    import Post from "../components/Post";

    export default {
        name: "NewsFeed",
        components: {
            NewPost,
            Post
        },
        data: () => {
            return {
                posts: null,
                loading: true
            }
        },
        mounted() {
            axios.get('/api/posts')
                .then(response => {
                    this.posts = response.data;
                })
                .catch(error => {
                    console.log("Unable to fetch posts : " + error);
                })
                .finally(() => {
                    this.loading = false;
                });
        }
    }
</script>

<style scoped>

</style>
