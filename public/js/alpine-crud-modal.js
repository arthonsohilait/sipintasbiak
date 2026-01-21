document.addEventListener('alpine:init', () => {

    Alpine.data('crudModal', (defaultForm = {}) => ({
        showModal: false,
        mode: 'create',
        form: {},

        openCreate() {
            this.mode = 'create'
            this.form = structuredClone(defaultForm)
            this.showModal = true
        },

        openEdit(item) {
            this.mode = 'edit'
            this.form = {
                ...structuredClone(defaultForm),
                ...item
            }
            this.showModal = true
        },

        closeModal() {
            this.showModal = false
        }
    }))

})
