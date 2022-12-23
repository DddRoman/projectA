<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    Items: {
        type: Object,
        default: () => ({}),
    },
    Doc: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    doc_version_id:props.Doc,
    type:0,
    dependence:0,
    prioritete:0,
    text:'',
    draft:1,
});

const submit = () => {
    form.post(route("item.store"));
};


</script>

<template>
    <Head title="Doc Create" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Item Create
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <input
                            v-model="doc_version_id"
                            name="doc_version_id"
                            type="hidden">
                            <div class="mb-6">
                                <label
                                    for="Text"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Item Text</label
                                >
                               <textarea
                               v-model="form.text"
                               name="text"
                               rows="20"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5.5"
                                 
                               ></textarea>
                                <div
                                    v-if="form.errors.text"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.text }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="Text"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Item Text</label
                                >

                                <div
                                    v-if="form.errors.text"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.text }}
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