import { Head } from '@inertiajs/react';
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
                        <div
                            key={user.id}
                            className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border"
                        >
                            <div className="relative grid gap-2 p-4 text-sm">
                                <h2 className="text-2xl">{user.name}</h2>
                                <p className="text-l text-gray-500 italic">
                                    {user.email}
                                </p>
                                <p className="flex justify-between gap-2">
                                    <span> Poslední přihlášení:</span>
                                    <span>
                                        {user.last_login_at
                                            ? user.last_login_at
                                            : 'Nikdy'}
                                    </span>
                                </p>
                                <p className="flex justify-between gap-2">
                                    <span> Aktivní: </span>
                                    <span
                                        className={`justify-self-end ${
                                            user.is_active
                                                ? 'bg-green-100 text-green-700'
                                                : 'bg-red-100 text-red-700'
                                        }`}
                                    >
                                        {user.is_active ? 'ANO' : 'NE'}
                                    </span>
                                </p>
                                <p className="grid gap-2">
                                    <span className="italic">
                                        {user.quote.text}
                                    </span>
                                    <span className="justify-self-end">
                                        —{user.quote.author}
                                    </span>
                                </p>
                            </div>
                        </div>
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
