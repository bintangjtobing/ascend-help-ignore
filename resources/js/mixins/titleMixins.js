function getTitle(vm) {
    const {
        title
    } = vm.$options
    if (title) {
        return typeof title === 'function' ?
            title.call(vm) :
            title
    }
}
export default {
    created() {
        const title = getTitle(this)
        if (title) {
            axios.get('/api/company-details/1').then((resp) => {
                // console.log(resp.data[0]);
                document.title = `${title} - ` + resp.data.company_id;
            });
        }
    },
}
