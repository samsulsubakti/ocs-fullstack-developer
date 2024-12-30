import React, { cloneElement } from 'react';
import { Container } from 'components/shared';
// import { Card } from 'components/ui';

const Simple = ({ children, content, ...rest }) => {
  return (
    <div className="h-full grid grid-cols-1 gap-4 bg-white p-8">
      <Container className="flex flex-col items-center h-full gap-10 py-[120px] bg-white rounded-xl">
        <div className='min-w-[388px]'>
          {content}
          {children ? cloneElement(children, { contentClassName: 'text-center', ...rest }) : null}
        </div>
      </Container>
    </div>
  );
};

export default Simple;
