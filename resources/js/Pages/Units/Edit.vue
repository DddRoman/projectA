<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    position: {
        type: Object,
        default: () => ({}),
    },
    deps: {
        type: Object,
        default: () => ({}),
    },
    structure: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    id: props.position.id,
    name: props.position.name,
    struct_id: props.position.struct_id,
    abv: props.position.abv,
    discription: props.position.discription,
    dependence: props.position.dependence,
});

           
const submit = () => {
    form.put(route("positions.update", props.position.id));
};
</script>

<template>
    <Head title="Position Edit" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Position Edit {{props.structure.name}} {{props.position.dependence}}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                       
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label
                                    for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >name</label
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
                                    for="abv"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >abv</label
                                >
                                <input
                                    type="text"
                                    v-model="form.abv"
                                    name="abv"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="abv"
                                />
                                <div
                                    v-if="form.errors.abv"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.abv }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="discription"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >discription</label
                                >
                                <textarea
                                    type="text"
                                    v-model="form.discription"
                                    name="discription"
                                    id="discription"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                ></textarea>

                                <div
                                    v-if="form.errors.discription"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.discription }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="dependence"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Dependence</label
                                >
                                <select
                                    type="text"
                                    v-model="form.dependence"
                                    name="dependence"
                                    id="dependence"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                >
                            <option value="0" id="dp_0">New</option>
                            <option v-for="option in props.deps" :value="option.id" :key="'dp_'+option.id">
                                {{option.name}}
                            </option>
                            </select>

                                <div
                                    v-if="form.errors.dependence"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.dependence }}
                                </div>
                            </div>
                            <button
                                type="submit"
                                class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing"
                                :class="{ 'opacity-25': form.processing }"
                            >
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>