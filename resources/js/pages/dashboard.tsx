import { Head } from '@inertiajs/react';
import UserCard from '@/components/dashboard/user-card';
import { dashboard } from '@/routes';

interface User {
    id: number;
    name: string;
    email: string;
    last_login_at: string;
    is_active: boolean;
    quote: { text: string; author: string };
}
interface Props {
    users: User[];
}

export default function Dashboard({ users = [] }: Props) {
    return (
        <>
            <Head title="Dashboard" />

            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="grid auto-rows-min gap-4 md:grid-cols-3">
                    {users.map((user) => (
                        <UserCard key={user.id} user={user} />
                    ))}
                </div>
            </div>
        </>
    );
}

Dashboard.layout = {
    breadcrumbs: [
        {
            title: 'Dashboard',
            href: dashboard(),
        },
    ],
};
