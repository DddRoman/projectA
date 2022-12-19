<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    industr: {
        type: Object,
        default: () => ({}),
    },
    struct: {
        type: Object,
        default: () => ({}),
    },

});


const form = useForm({
    name:'',
    shifr:'',
    version:1,
    year:'2023',
});

const submit = () => {
    form.post(route("docs.store"));
};


</script>

<template>
    <Head title="Doc Create" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Doc Create
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label
                                    for="Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    v-model="form.name"
                                    name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Name"
                                />
                                <div
                                    v-if="form.errors.name"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="shifr"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >shifr</label
                                >
                                <input
                                    type="text"
                                    v-model="form.shifr"
                                    name="shifr"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="shifr"
                                />
                                <div
                                    v-if="form.errors.shifr"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.shifr }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="version"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >version</label
                                >
                                <input
                                    type="number"
                                    v-model="form.version"
                                    name="version"

                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="version"
                                />
                                <div
                                    v-if="form.errors.version"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.version }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="year"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >year</label
                                >
                                <input
                                    type="number"
                                    v-model="form.year"
                                    name="year"

                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="year"
                                />
                                <div
                                    v-if="form.errors.year"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.year }}
                                </div>
                            </div>
                            
                            <div class="mb-6"> 
                               <button
                                type="submit"
                                class="text-black bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "

                            >
                                Записать
                            </button>  
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>