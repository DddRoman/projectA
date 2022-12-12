<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    industria: {
        type: Object,
        default: () => ({}),
    },
    deps: {
        type: Object,
        default: () => ({}),
    },
    dep: {
        type: Object,
        default: () => (0),
    },
});

const form = useForm({
    ind_id:props.industria.id,
    dependence:props.dep,
    name: '',
    abv: '',
});
//form.ind_id=industria.id;
//form.dependence=dep;
const submit = () => {
    form.post(route("structures.store"));
};
 </script>

<template>
    <Head title="Structure Create" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Structure Create
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <input
                                    type="hidden"
                                    v-model="form.ind_id"
                                    id="ind_id"
                                    name="ind_id"
                                />
                                <label
                                    for="struct_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Structure dependence</label
                                >
                                <select 
                                v-model="form.dependence"
                                name="struct_id"
                                :value="dep"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                  
                                >
                                <option id="struct_id_0" value="0">
                                    New
                                </option>
                                <option v-for="option in deps" :value="option.id" :key="'dep_'+option.id" >
                                    {{ option.name }}
                                </option>
                                </select>

                                <div
                                    v-if="form.errors.struct_id"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.struct_id }}
                                </div>
                            </div>
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
                                    placeholder="Name structure"
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
                                    for="abv"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >ABV</label
                                >
                                <input
                                    type="text"
                                    v-model="form.abv"
                                    name="abv"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="abviature"
                                />
                                <div
                                    v-if="form.errors.abv"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.abv }}
                                </div>
                            </div>
 
                            <div class="mb-6"> 
                               <button
                                type="submit"
                                class="text-black bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "

                            >
                                Submit
                            </button>  
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>