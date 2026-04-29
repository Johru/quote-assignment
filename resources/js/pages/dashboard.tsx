import { Head } from '@inertiajs/react';
import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
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
                            <div className="relative p-4">
                                <h2>{user.name}</h2>
                                <p>{user.email}</p>
                                <p>
                                    Poslední přihlášení:{' '}
                                    {user.last_login_at
                                        ? user.last_login_at
                                        : 'Nikdy'}
                                </p>
                                <p>Aktivní: {user.is_active ? 'ANO' : 'NE'}</p>
                                <p>
                                    {/*   {user.quote[0]} — {user.quote[1]}*/}
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
